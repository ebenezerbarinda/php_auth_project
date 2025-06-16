# Simple PHP Auth Project

This is a minimal PHP authentication project with a signup page, login page,
and MySQL database integration.

## Prerequisites
- PHP ≥ 7.4 with PDO MySQL extension enabled
- MySQL or MariaDB server
- Web server (Apache, Nginx, or PHP's built‑in server)

## Setup Steps
1. **Clone / Extract the project**
   ```bash
   unzip php_auth_project.zip
   cd php_auth_project
   ```

2. **Create the database**
   ```bash
   mysql -u root -p < db/schema.sql
   ```

3. **Configure database credentials**

   Edit `includes/config.php` with your MySQL username and password.

4. **Serve the application**
   ```bash
   # Using PHP's built‑in server (development only)
   php -S localhost:8000 -t public
   ```

   Then visit `http://localhost:8000` in your browser.

## File Structure
```
php_auth_project/
├── db/
│   └── schema.sql
├── includes/
│   ├── config.php
│   └── functions.php
└── public/
    ├── index.php
    ├── signup.php
    ├── register.php
    ├── login.php
    ├── dashboard.php
    ├── logout.php
    └── styles.css
```

## Security Notes
- Passwords are hashed using `password_hash`.
- All database queries use prepared statements to prevent SQL injection.
- Sessions are used to manage authentication state.

## Next Steps
- Add CSRF protection tokens to forms.
- Implement email verification.
- Use environment variables for configuration.

## Docker Quick Start

### Build & Run Locally
```bash
docker-compose up --build
```

This spins up two containers:
- `php_auth_app` on port 8000
- `php_auth_db` MySQL 8.0 with volume `db_data`

Visit `http://localhost:8000`.

### Build & Push to Amazon ECR
```bash
# Authenticate Docker to ECR
aws ecr get-login-password --region <REGION> | docker login --username AWS --password-stdin <ACCOUNT_ID>.dkr.ecr.<REGION>.amazonaws.com

# Tag and push
docker build -t php-auth .
docker tag php-auth:latest <ACCOUNT_ID>.dkr.ecr.<REGION>.amazonaws.com/php-auth:latest
docker push <ACCOUNT_ID>.dkr.ecr.<REGION>.amazonaws.com/php-auth:latest
```

### Deploy to EKS
```bash
kubectl apply -f k8s/db-secret.yaml
kubectl apply -f k8s/deployment.yaml
kubectl apply -f k8s/service.yaml
```

### Deploy to ECS (Fargate)
1. Create a new service using the task definition in `ecs/task-definition.json`.
2. Ensure your cluster has subnets, security groups, and load balancer (optional).
3. Environment variables must point to your external database (e.g., Amazon RDS).

---
