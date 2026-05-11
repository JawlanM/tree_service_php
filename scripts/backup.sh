#!/bin/bash

BACKUP DIR="backups"
DATE=$(date +%F)

mkdir -p $BACKUP_DIR

/C/xampp/mysql/bin/mysqldump.exe -u root arborist_tre > backups/backup.sql

echo "Backup completed: backup_$DATE.sql"
