run: 
	docker-compose up -d

stop:
	docker-compose stop -t1
	docker-compose rm -f
	docker network prune -f

stop-prune:
	docker-compose stop -t1
	docker-compose rm -f
	docker network prune -f
	docker volume prune -f

volume-prune:
	docker volume prune -f

bootstrap:
	./bootstrap.sh
