#! /bin/bash
set -e

mysqldump -d oastat_xata oastat_web_games
mysqldump -d oastat_xata oastat_web_maplist
mysqldump -d oastat_xata oastat_web_players
mysqldump -d oastat_xata oastat_web_scores
mysqldump -d oastat_xata oastat_web_kills_by_weapon
mysqldump -d oastat_xata oastat_web_kills_by_weapon_gamenumber

