#! /bin/bash
set -e

./exportviews.sh | sed -e 's/DEFINER[ ]*=[ ]*[^*]*\*/\*/' > ./create_views.sql
