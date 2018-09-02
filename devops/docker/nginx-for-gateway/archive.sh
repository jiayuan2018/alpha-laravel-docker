#!/bin/bash

set -e

function run_cmd() {
    local t=`date`
    echo "$t: $1"
    eval $1
}

date=`date +"%Y-%m-%d"`
log_dir='/var/log/nginx'

for item in core service android ios www wx;
do
	log_file=${log_dir}/${item}_9dy_access.log
    archive_file=${log_file}-${date}

    if [ -f $log_file ];
	then
		run_cmd "mv $log_file $archive_file"
	fi
done

run_cmd "kill -USR1 `cat /var/run/nginx.pid`"


for item in core service android ios www wx;
do
	archive_file=${log_dir}/${item}_9dy_access.log-${date}

    if [ -f $archive_file ];
	then
		run_cmd "gzip $archive_file"
	fi
done

