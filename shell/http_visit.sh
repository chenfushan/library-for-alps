#!/bin/bash

# This is a shell script for visit a url website.

# url.conf is a file contains url.
# just one url per line in url.conf file.

# page.html contains the return html code.

# sleep is the number of second between two visit time.

function visiturl()
{
	if [ -f url.conf ]; then
		cat url.conf | while read b_url
		do
			curl -A "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)"  -o page.html $b_url;
		done
	fi
}

while sleep 10
do
	$(visiturl)
done
