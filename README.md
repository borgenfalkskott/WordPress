# WordPress + Bedrock + Docker

A nice local dev env using [WordPress](https://wordpress.org/), [Roots/Bedrock](https://roots.io/bedrock/) and [Docker](https://www.docker.com/).  
Making it easy to version control and maintain your next wp theme or plugin.

1. Rename the container names in `docker-compose.yml` to your needs.
2. Make a copy of `.env.example`, name it `.env` and enter your credentials. You can keep most of what's in there already.

3. Open a new tab in your terminal at the root of the project and start the local dev env: `docker compose up`

4. Install WordPress by going to http://localhost:8080

5. Open a new tab in your terminal and shut down: `docker compose down`
