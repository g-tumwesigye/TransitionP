TransitionPlus
Project Overview
TransitionPlus is a web-based application designed to support high school students in Rwanda as they transition to higher education. It offers a comprehensive platform for personalized guidance, resource access, mentorship programs, academic support, and career readiness training. The project aims to empower students to make informed decisions, set goals, and achieve academic success.

Mission Statement
To empower high school students through TransitionPlus, utilizing tech skills to support their successful transition to higher education. By fostering informed decision-making, goal-setting, and academic success, we aim to cultivate productive citizens who contribute to social and economic development, while reducing youth unemployment and preventing engagement in unproductive activities such as crime, drug use, prostitution, and alcohol consumption.

Problem Statement
High school students in Rwanda face significant challenges when transitioning to higher education, including a lack of guidance, resources, and mentorship. These challenges hinder their ability to make informed decisions, set realistic goals, and succeed academically.

Proposed Solution
TransitionPlus addresses these challenges by providing a digital platform that offers personalized guidance, access to educational resources, mentorship opportunities, and academic support. The platform also includes features for career readiness training and community engagement.

Functionalities
User management
Personalized guidance
Resource access
Mentorship programs
Academic support
Career readiness training
Risk prevention education
Community engagement
Progress tracking
Feedback mechanisms
Intended Users
Students
Mentors
Administrators
Educational institutions
Parents/Guardians
Technical Overview
TransitionPlus is developed using the Laravel PHP framework and the Bootstrap front-end framework. It is designed to be accessible via web browsers and mobile devices, ensuring compatibility across various platforms and devices.


Installation
Prerequisites
PHP 7.3 or higher
Node.js and npm
Git
Steps
Clone the repository:
git clone https://github.com/yourusername/TransitionPlus.git
Navigate to the project directory cd TransitionPlus


Technology Stack
- **Frontend**: HTML, CSS, Bootstrap, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## Installation
To set up the project locally, follow these steps:

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/yourusername/TransitionPlus.git
    cd TransitionPlus
    ```

2. **Set Up the Database**:
    - Create a MySQL database named `TransitionP`.
    - Import the provided `transitionp.sql` file to set up the necessary tables:
      ```sql
      CREATE TABLE users (
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          username VARCHAR(30) NOT NULL,
          email VARCHAR(50),
          password VARCHAR(255) NOT NULL,
          role VARCHAR(10) NOT NULL
      );
      INSERT INTO users (username, email, password, role) VALUES ('admin', 'admin@example.com', '$2y$10$examplehashedpassword', 'admin');
      ```

3. **Configure Database Connection**:
    - Update the database connection settings in `config.php`:
    ```php
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "TransitionP";
    ?>
    ```

4. **Run the Application**:
    - Start a local PHP server from the root of the project:
    ```bash
    php -S localhost:8000
    ```
    - Open your web browser and navigate to `http://localhost:8000`.

## Usage
- **Login**:
  - Access the login page at `http://localhost:8000/login.php`.
  - Enter your email and password to log in.

- **User Management**:
  - Admins can access the user management page at `http://localhost:8000/manage_users.php`.
  - Admins can accept, reject, or delete users from this page.

## Contributing
We welcome contributions to improve TransitionPlus! To contribute, follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix:
    ```bash
    git checkout -b feature-name
    ```
3. Commit your changes:
    ```bash
    git commit -m "Add some feature"
    ```
4. Push to the branch:
    ```bash
    git push origin feature-name
    ```
5. Open a pull request on GitHub.

