#! /bin/bash
set -e

#Tables
mysqldump oastat_xata oastat_web_valuelists

#Views
mysqldump -d oastat_xata oastat_web_games
mysqldump -d oastat_xata oastat_web_kills_by_weapon
mysqldump -d oastat_xata oastat_web_kills_by_weapon_gamenumber
mysqldump -d oastat_xata oastat_web_maplist
mysqldump -d oastat_xata oastat_web_map_suicide
mysqldump -d oastat_xata oastat_web_players
mysqldump -d oastat_xata oastat_web_scores
mysqldump -d oastat_xata oastat_web_team_events

