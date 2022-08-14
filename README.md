### SimpleNonRelationalDB

This is a pet project to demonstrate the basic ability to use a non-relational database (mongo).

The idea was taken from https://neal.fun/absurd-trolley-problems/.

You will be asked to answer on 3 trolley problems

![image1](storage/githubMedia/image1.png?raw=true)

After the answer, you will the percentage of people that chose the same answer

![image2](storage/githubMedia/image2.png?raw=true)

## Installation

1. `cp .env.example .env`
2. `make docker-build`
3. `make install`
4. `make generate-key`
5. `make start`
6. `make migrate`
7. `make seed`

If your Windows does not set WORKDIR and CURRENT_DIR variables by itself during the execution of makefile commands,
add next to your `.env` file:

```shell
CURRENT_DIR={Absolute path to the project root directory}
WORKDIR=/app
```
