#!/usr/bin/env bash

export $(grep -v '^#' ../.env | xargs)

WP_ENV=$WP_ENV

case ${WP_ENV} in
  _production)
    db_name=${PRODUCTION_DB_NAME}
    ;;
  _staging)
    db_name=${STAGING_DB_NAME}
    ;;
  *)
    db_name=${DEV_DB_NAME}
    ;;
esac

# CLEAN UP CURRENT DB
mysql --login-path=local -e "drop database ${db_name}"
mysql --login-path=local -e "create database ${db_name}"

# IMPORT PROVIDED DB
mysql --login-path=local ${db_name} < database.sql