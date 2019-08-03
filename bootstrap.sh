#!/bin/bash

curl -d '{"login" : "admin", "password" : "123456", "email" : "admin@rpgcloud.com"}' http://localhost/services/player.php

curl -d '{"name" : "world", "description" : "World one"}' http://localhost/services/world.php

curl -d '{"name" : "Elf", "hp" : 100, "mp" : 100, "atk" : 25, "defense" : 25, "agility" : 25, "inteligence" : 25}' http://localhost/services/race.php
curl -d '{"name" : "Orc", "hp" : 100, "mp" : 100, "atk" : 25, "defense" : 25, "agility" : 25, "inteligence" : 25}' http://localhost/services/race.php
curl -d '{"name" : "Human", "hp" : 100, "mp" : 100, "atk" : 25, "defense" : 25, "agility" : 25, "inteligence" : 25}' http://localhost/services/race.php

curl -d '{"name" : "Aragorn", "race" : "Elf"}' http://localhost/services/hero.php
curl -d '{"name" : "Aragorn2", "race" : "Elf"}' http://localhost/services/hero.php