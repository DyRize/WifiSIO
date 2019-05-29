#!/bin/bash 

# Inspir� d'un script trouv� sur phpnews.fr (plus en ligne)
# Version 0.3 13/05/2013

# Script sous licence BEERWARE

set -eu

## Param�tres
USER='root'
PASS='' 
# R�pertoire de stockage des sauvegardes
DATADIR="/var/backups/mysql"
# R�pertoire de travail (cr�ation/compression)
DATATMP=$DATADIR
# Nom du dump
DATANAME="dump_$(date +%d.%m.%y@%Hh%M)"
# Compression
COMPRESSIONCMD="tar -czf" 
COMPRESSIONEXT=".tar.gz"
# R�tention / rotation des sauvegardes
RETENTION=30
# Exclure des bases
EXCLUSIONS='(information_schema|performance_schema)'
# Email pour les erreurs (0 pour d�sactiver
EMAIL=0
# Log d'erreur
exec 2> ${DATATMP}/error.log

## D�but du script

ionice -c3 -p$$ &>/dev/null
renice -n 19 -p $$ &>/dev/null

function cleanup {
    if [ "`stat --format %s ${DATATMP}/error.log`" != "0" ] && [ "$EMAIL" != "0" ] ; then
        cat ${DATATMP}/error.log | mail -s "Backup MySQL $DATANAME - Log error" ${EMAIL}
    fi
}
trap cleanup EXIT

# On cr�e sur le disque un r�pertoire temporaire
mkdir -p ${DATATMP}/${DATANAME}

# On place dans un tableau le nom de toutes les bases de donn�es du serveur 
databases="$(mysql -u $USER -p$PASS -Bse 'show databases' | grep -v -E $EXCLUSIONS)"

# Pour chacune des bases de donn�es trouv�es ... 
for database in ${databases[@]} 
do
    echo "dump : $database"
    mysqldump -u $USER -p$PASS --quick --add-locks --lock-tables --extended-insert $database  > ${DATATMP}/${DATANAME}/${database}.sql
done 

# On tar tous
cd ${DATATMP}
${COMPRESSIONCMD} ${DATANAME}${COMPRESSIONEXT} ${DATANAME}/
chmod 600 ${DATANAME}${COMPRESSIONEXT}

# On le d�place dans le r�pertoire
if [ "$DATATMP" != "$DATADIR" ] ; then
    mv ${DATANAME}${COMPRESSIONEXT} ${DATADIR}
fi

# Lien symbolique sur la dernier version
cd ${DATADIR}
set +eu
unlink last${COMPRESSIONEXT}
set -eu
ln ${DATANAME}${COMPRESSIONEXT} last${COMPRESSIONEXT}

# On supprime le r�pertoire temporaire 
rm -rf ${DATATMP}/${DATANAME}

echo "Suppression des vieux backup : "
find ${DATADIR} -name "*${COMPRESSIONEXT}" -mtime +${RETENTION} -print -exec rm {} \;