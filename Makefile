ifeq (${OS},Windows_NT)
.ONESHELL:
endif

APP       := simple-non-relational-project
WORKDIR   := /app

ifeq (${OS},Windows_NT)
CURRENT_DIR                := ${CURDIR}
DOCKER_COMPOSE             := docker-compose
else
CURRENT_DIR                := ${PWD}
DOCKER_COMPOSE             := WORKDIR=$(WORKDIR) CURRENT_DIR=$(CURRENT_DIR) docker-compose
endif

DOCKER_RUN := docker run --rm -v ${CURRENT_DIR}:$(WORKDIR) --workdir=$(WORKDIR)

ifeq (${OS},Windows_NT)
docker-build:
	@set WORKDIR=$(WORKDIR)
	@set CURRENT_DIR=$(CURRENT_DIR)
	@set XDEBUG_INSTALL=0
	@$(DOCKER_COMPOSE) build app
docker-build-dev:
	@set WORKDIR=$(WORKDIR)
	@set CURRENT_DIR=$(CURRENT_DIR)
	@set XDEBUG_INSTALL=1
	@$(DOCKER_COMPOSE) build app
start:
	@set WORKDIR=$(WORKDIR)
	@set CURRENT_DIR=$(CURRENT_DIR)
	@$(DOCKER_COMPOSE) -p $(APP) up -d
stop:
	@set WORKDIR=$(WORKDIR)
	@set CURRENT_DIR=$(CURRENT_DIR)
	@$(DOCKER_COMPOSE) -p $(APP) down
else
docker-build:
	@XDEBUG_INSTALL=0 $(DOCKER_COMPOSE) build app
docker-build-dev:
	@XDEBUG_INSTALL=1 $(DOCKER_COMPOSE) build app
start:
	@$(DOCKER_COMPOSE) -p $(APP) up -d
stop:
	@$(DOCKER_COMPOSE) -p $(APP) down
endif

install:
	@$(DOCKER_RUN) $(APP) sh -c "composer install"
update:
	@$(DOCKER_RUN) $(APP) sh -c "composer update --with-all-dependencies"

generate-key:
	@$(DOCKER_RUN) $(APP) php artisan key:generate

migrate:
	@docker exec $(APP) php artisan migrate
rollback:
	@docker exec $(APP) php artisan migrate:rollback --step=1

restart: stop start
