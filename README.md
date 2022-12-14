### SimpleNonRelationalDB

This is a pet project to demonstrate the basic ability to use a non-relational database (mongo).

The idea was taken from https://neal.fun/absurd-trolley-problems/.

You will be asked to answer on 3 trolley problems

![image1](storage/githubMedia/image1.png?raw=true)

After the answer, you will the percentage of people that chose the same answer

![image2](storage/githubMedia/image2.png?raw=true)

## Database structure

There are 3 collections: Problems, Answers and Statistics

![collections](storage/githubMedia/collections.png?raw=true)

Problem documents contain just the problem description and path to the image

![problemDocument](storage/githubMedia/problemDocument.png?raw=true)

Answers contain the description of the answer and an id of a problem it is attached to in order to provide the
One-to-Many relationship.

![answerDocument](storage/githubMedia/answerDocument.png?raw=true)

Statistics have an amount of people who chose this answer and answer id in order to provide
One-to-One relationship.

![statisticDocument](storage/githubMedia/statisticDocument.png?raw=true)

## Installation

1. `cp .env.example .env`
2. `make docker-build`
3. `make install`
4. `make generate-key`
5. `make start`
6. `make migrate`
7. `make seed`

To log in to the database, use username/password authentication with SHA-256 (root, Securepass1!)
mongodb://localhost:27017

If your Windows does not set WORKDIR and CURRENT_DIR variables by itself during the execution of makefile commands,
add next to your `.env` file:

```shell
CURRENT_DIR={Absolute path to the project root directory}
WORKDIR=/app
```
