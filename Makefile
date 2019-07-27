run: 
	docker-compose up -d

stop:
	docker-compose stop -t1
	docker-compose rm -f
	docker network prune -f

volume-prune:
	docker volume prune -f
