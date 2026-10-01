<div id="top">

<!-- HEADER STYLE: CLASSIC -->
<div align="center">

<img src="ASZhoroviceWebphp.png" width="30%" style="position: relative; top: 0; right: 0;" alt="Project Logo"/>

# ASZHOROVICEWEBPHP

<em>Secure, Seamless, Powering Your Digital Race Experience</em>

<!-- BADGES -->
<img src="https://img.shields.io/github/last-commit/Mir04ange/ASZhoroviceWebphp?style=flat&logo=git&logoColor=white&color=0080ff" alt="last-commit">
<img src="https://img.shields.io/github/languages/top/Mir04ange/ASZhoroviceWebphp?style=flat&color=0080ff" alt="repo-top-language">
<img src="https://img.shields.io/github/languages/count/Mir04ange/ASZhoroviceWebphp?style=flat&color=0080ff" alt="repo-language-count">

<em>Built with the tools and technologies:</em>

<img src="https://img.shields.io/badge/JSON-000000.svg?style=flat&logo=JSON&logoColor=white" alt="JSON">
<img src="https://img.shields.io/badge/Markdown-000000.svg?style=flat&logo=Markdown&logoColor=white" alt="Markdown">
<img src="https://img.shields.io/badge/npm-CB3837.svg?style=flat&logo=npm&logoColor=white" alt="npm">
<img src="https://img.shields.io/badge/Composer-885630.svg?style=flat&logo=Composer&logoColor=white" alt="Composer">
<img src="https://img.shields.io/badge/JavaScript-F7DF1E.svg?style=flat&logo=JavaScript&logoColor=black" alt="JavaScript">
<img src="https://img.shields.io/badge/PHP-777BB4.svg?style=flat&logo=PHP&logoColor=white" alt="PHP">
<img src="https://img.shields.io/badge/Bootstrap-7952B3.svg?style=flat&logo=Bootstrap&logoColor=white" alt="Bootstrap">

</div>
<br>

---

## 📄 Table of Contents

- [Overview](#-overview)
- [Getting Started](#-getting-started)
    - [Prerequisites](#-prerequisites)
    - [Installation](#-installation)
    - [Usage](#-usage)
    - [Testing](#-testing)
- [Features](#-features)
- [Project Structure](#-project-structure)
    - [Project Index](#-project-index)
- [Roadmap](#-roadmap)
- [Contributing](#-contributing)

---

## ✨ Overview

ASZhoroviceWebphp is a versatile PHP web application framework tailored for event management, security, and dynamic content delivery. It simplifies secure environment setup, document generation, and administrative oversight, making it ideal for developers building robust, scalable web solutions. The core features include:

- 🛡️ **Security Environment:** Loads sensitive credentials from a .env file, ensuring secure and environment-specific configurations.
- 📄 **PDF Generation:** Integrates PHP libraries for creating and manipulating PDFs, perfect for reports and invoices.
- 🔐 **User Authentication:** Manages secure login sessions and user workflows with detailed logging.
- ⚙️ **Content Management:** Supports dynamic updates to homepage carousels and event data, enabling flexible content control.
- 📝 **Audit & Security Policies:** Implements comprehensive logging and vulnerability reporting to safeguard the application.
- 💾 **Database Integration:** Handles registration data, logs, and environment configurations with structured schemas.

---

## 📌 Features

|      | Component       | Details                                                                                     |
| :--- | :-------------- | :------------------------------------------------------------------------------------------ |
| ⚙️  | **Architecture**  | <ul><li>PHP-based MVC structure</li><li>Separation of concerns with controllers, views, models</li><li>Uses Composer for dependency management</li></ul> |
| 🔩 | **Code Quality**  | <ul><li>Standard PHP syntax, PSR-12 compliance likely</li><li>Moderate code comments, some inline documentation</li><li>Code organization follows common PHP project conventions</li></ul> |
| 📄 | **Documentation** | <ul><li>Basic README with project overview</li><li>Configuration instructions sparse</li><li>No dedicated API or developer docs</li></ul> |
| 🔌 | **Integrations**  | <ul><li>Uses Composer for PHP dependencies</li><li>NPM for JavaScript packages</li><li>Includes JSON configs for registration, carousel images</li><li>Potential integration with SQL database</li></ul> |
| 🧩 | **Modularity**    | <ul><li>Moderate modularity via separate PHP classes/files</li><li>Uses JSON files for configurable content</li><li>Limited plugin or extension points</li></ul> |
| 🧪 | **Testing**       | <ul><li>No evident automated tests or testing framework</li><li>Likely manual testing required</li></ul> |
| ⚡️  | **Performance**   | <ul><li>Basic caching or optimization not apparent</li><li>Uses minified JS/CSS (implied by presence of JS, bootstrap)</li></ul> |
| 🛡️ | **Security**      | <ul><li>Potential vulnerabilities due to lack of explicit security measures</li><li>Uses robots.txt, but no evident CSRF/XSS protections</li></ul> |
| 📦 | **Dependencies**  | <ul><li>PHP: via composer.json and composer.lock</li><li>JavaScript: via package.json</li><li>JSON configs for registration, images, race dates</li></ul> |

---

## 📁 Project Structure

```sh
└── ASZhoroviceWebphp/
    ├── README.md
    ├── SECURITY.md
    ├── SECURITY_ENV_SETUP.md
    ├── SVGLOGA
    │   ├── JOP.svg
    │   ├── lol.txt
    │   └── sadasdsd.svg
    ├── back
    │   ├── Database
    │   ├── LOGGING_SYSTEM.md
    │   ├── delete_prihlaska.php
    │   ├── login.php
    │   ├── logout.php
    │   ├── register.php
    │   ├── update.php
    │   ├── updateZaplaceno.php
    │   ├── update_carousel.php
    │   ├── update_date.php
    │   └── view_logs.php
    ├── composer.json
    ├── composer.lock
    ├── front
    │   ├── Login.php
    │   ├── Login_backup.php
    │   ├── carousel_images.json
    │   ├── css
    │   ├── download_pdf.php
    │   ├── img
    │   ├── imgs.php
    │   ├── js
    │   ├── main.php
    │   ├── main_backup.php
    │   ├── pdfs
    │   ├── poradatele.php
    │   ├── prihlaska.php
    │   ├── prihlaska_backup.php
    │   ├── race_date.txt
    │   ├── registrace.json
    │   ├── scss
    │   └── update_carousel.php
    ├── index.php
    ├── package-lock.json
    ├── package.json
    └── robots.txt
```

---

### 📑 Project Index

<details open>
	<summary><b><code>ASZHOROVICEWEBPHP/</code></b></summary>
	<!-- __root__ Submodule -->
	<details>
		<summary><b>__root__</b></summary>
		<blockquote>
			<div class='directory-path' style='padding: 8px 0; color: #666;'>
				<code><b>⦿ __root__</b></code>
			<table style='width: 100%; border-collapse: collapse;'>
			<thead>
				<tr style='background-color: #f8f9fa;'>
					<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
					<th style='text-align: left; padding: 8px;'>Summary</th>
				</tr>
			</thead>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/SECURITY_ENV_SETUP.md'>SECURITY_ENV_SETUP.md</a></b></td>
					<td style='padding: 8px;'>- Establishes a secure environment for database credential management by loading sensitive information from a.env file, replacing hardcoded values<br>- Enhances security, facilitates environment-specific configurations, and simplifies credential rotation<br>- Integrates seamlessly with existing codebase, ensuring consistent database connectivity while preventing credential exposure in version control and supporting secure deployment workflows.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/composer.json'>composer.json</a></b></td>
					<td style='padding: 8px;'>- Defines project dependencies for PDF generation, integrating popular PHP libraries to enable robust creation and manipulation of PDF documents<br>- Serves as the foundation for generating dynamic reports, invoices, or other document outputs within the application, ensuring seamless PDF handling across the codebase<br>- Facilitates consistent and reliable document processing aligned with the overall architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/index.php'>index.php</a></b></td>
					<td style='padding: 8px;'>- Redirects incoming requests to the main application interface, serving as the entry point for the web project<br>- It ensures users are directed to the primary user interface located in the front directory, facilitating seamless navigation and establishing a centralized access point within the overall architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/README.md'>README.md</a></b></td>
					<td style='padding: 8px;'>- Provides an overview of the web applications purpose, emphasizing user authentication and payment processing functionalities essential for race registration<br>- It highlights the focus on ensuring secure login and transaction handling within the broader system architecture, while leaving visual design aspects to the developer<br>- This summary clarifies the core objectives related to user management and financial operations in the project.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/SECURITY.md'>SECURITY.md</a></b></td>
					<td style='padding: 8px;'>- Defines the projects security policies, including supported versions and vulnerability reporting procedures, to ensure safe usage and responsible disclosure<br>- It guides users on maintaining secure interactions with the software and facilitates prompt handling of security issues, thereby safeguarding the integrity and trustworthiness of the entire codebase.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/robots.txt'>robots.txt</a></b></td>
					<td style='padding: 8px;'>- Defines web crawling policies to guide search engine bots on how to interact with the site<br>- It specifies access permissions, crawl delay, and request rate limits to optimize server load and ensure efficient indexing within the overall architecture<br>- This configuration supports balanced web crawling, enhancing site discoverability while maintaining performance.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/package.json'>package.json</a></b></td>
					<td style='padding: 8px;'>- Defines the core project metadata and dependencies for the web application, establishing its identity, versioning, and essential libraries<br>- Serves as the foundational configuration that guides package management, project setup, and integration with external repositories, ensuring consistent environment setup and facilitating development and deployment workflows.</td>
				</tr>
			</table>
		</blockquote>
	</details>
	<!-- SVGLOGA Submodule -->
	<details>
		<summary><b>SVGLOGA</b></summary>
		<blockquote>
			<div class='directory-path' style='padding: 8px 0; color: #666;'>
				<code><b>⦿ SVGLOGA</b></code>
			<table style='width: 100%; border-collapse: collapse;'>
			<thead>
				<tr style='background-color: #f8f9fa;'>
					<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
					<th style='text-align: left; padding: 8px;'>Summary</th>
				</tr>
			</thead>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/SVGLOGA/lol.txt'>lol.txt</a></b></td>
					<td style='padding: 8px;'>- Summary of <code>SVGLOGA/lol.txt</code>This file contains an SVG (Scalable Vector Graphics) image, serving as a visual asset within the project<br>- Positioned within the <code>SVGLOGA</code> directory, it likely functions as a logo or branding element integrated into the applications user interface<br>- Its purpose is to provide a scalable, resolution-independent graphic that enhances the visual identity of the project, contributing to a cohesive and professional user experience across different platforms and devices.</td>
				</tr>
			</table>
		</blockquote>
	</details>
	<!-- back Submodule -->
	<details>
		<summary><b>back</b></summary>
		<blockquote>
			<div class='directory-path' style='padding: 8px 0; color: #666;'>
				<code><b>⦿ back</b></code>
			<table style='width: 100%; border-collapse: collapse;'>
			<thead>
				<tr style='background-color: #f8f9fa;'>
					<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
					<th style='text-align: left; padding: 8px;'>Summary</th>
				</tr>
			</thead>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/delete_prihlaska.php'>delete_prihlaska.php</a></b></td>
					<td style='padding: 8px;'>- Handles the deletion of registration entries within the system, ensuring only authorized administrators can perform this action<br>- It verifies the registration ID, executes the removal from the database, and logs the operation for audit purposes<br>- This component maintains data integrity and accountability in the registration management workflow of the application.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/LOGGING_SYSTEM.md'>LOGGING_SYSTEM.md</a></b></td>
					<td style='padding: 8px;'>- Implements a comprehensive admin logging system that tracks all administrative activities, including logins, updates, deletions, and access to logs<br>- It ensures accountability and security through detailed records of actions, user information, and timestamps, supporting audit trails and facilitating monitoring within the overall application architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/logout.php'>logout.php</a></b></td>
					<td style='padding: 8px;'>- Handles user logout by terminating the session, logging the event for administrative tracking, and redirecting to the main interface<br>- Ensures secure session cleanup within the broader authentication and user management architecture, maintaining audit trails and user state consistency across the application.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/update.php'>update.php</a></b></td>
					<td style='padding: 8px;'>- Facilitates user account management by updating activation status within the database based on administrative input<br>- Integrates with the broader system architecture to enable authorized personnel to control user access, ensuring secure and efficient user management workflows<br>- Serves as a backend component that maintains data integrity and supports administrative functions across the application.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/view_logs.php'>view_logs.php</a></b></td>
					<td style='padding: 8px;'>- Provides an administrative interface for viewing and filtering user activity logs within the application<br>- Ensures secure access for administrators, displays detailed records of actions performed, and supports filtering by specific actions to facilitate monitoring and auditing of system activity<br>- Integrates with backend logging mechanisms to present real-time, organized log data aligned with the overall system architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/register.php'>register.php</a></b></td>
					<td style='padding: 8px;'>- Handles user registration by securely capturing and storing new user credentials in the database, ensuring password hashing for security<br>- Integrates with the broader authentication system to facilitate account creation, enabling users to register and subsequently access protected features within the application<br>- Supports the overall architecture by maintaining user data integrity and flow within the registration process.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/update_date.php'>update_date.php</a></b></td>
					<td style='padding: 8px;'>- Facilitates secure updating of the race date by administrators, ensuring proper validation, storage, and logging of changes<br>- Integrates with the broader system to maintain accurate event scheduling, while enforcing access control and providing feedback on update success or failure<br>- Supports consistent race date management within the applications architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/updateZaplaceno.php'>updateZaplaceno.php</a></b></td>
					<td style='padding: 8px;'>- Handles updating payment status for event registrations, ensuring only administrators can modify records<br>- It verifies and updates payment flags in the database, logs the changes for audit purposes, and redirects users appropriately<br>- This component integrates with the broader system to maintain accurate payment tracking and user access control within the event management architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/login.php'>login.php</a></b></td>
					<td style='padding: 8px;'>- Handles user authentication by verifying credentials against the database, establishing user sessions upon successful login, and logging login attempts for audit purposes<br>- Integrates with the broader system architecture to facilitate secure access control and user management, ensuring only authorized users gain entry while maintaining detailed activity logs for security oversight.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/update_carousel.php'>update_carousel.php</a></b></td>
					<td style='padding: 8px;'>- Facilitates the update of carousel images by handling file uploads, storing new image paths, and maintaining the carousel configuration in a JSON file<br>- Ensures only administrators can perform updates, logs changes for audit purposes, and redirects users to the main page post-operation<br>- Integrates with the broader system to dynamically manage homepage visual content.</td>
				</tr>
			</table>
			<!-- Database Submodule -->
			<details>
				<summary><b>Database</b></summary>
				<blockquote>
					<div class='directory-path' style='padding: 8px 0; color: #666;'>
						<code><b>⦿ back.Database</b></code>
					<table style='width: 100%; border-collapse: collapse;'>
					<thead>
						<tr style='background-color: #f8f9fa;'>
							<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
							<th style='text-align: left; padding: 8px;'>Summary</th>
						</tr>
					</thead>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/Database/logs.sql'>logs.sql</a></b></td>
							<td style='padding: 8px;'>- Defines the structure for logging administrative actions within the system, capturing details such as user activity, IP address, user agent, and timestamps<br>- Serves as a foundational component for audit trails, enabling monitoring, troubleshooting, and security oversight across the applications backend architecture<br>- Ensures organized, efficient storage of log data linked to user activities.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/Database/administrace.sql'>administrace.sql</a></b></td>
							<td style='padding: 8px;'>- Defines the database schema and initial data for user authentication and role management within the application<br>- It establishes the structure of the login system, enabling secure user access control and administrative functions integral to the overall system architecture<br>- This setup supports user management workflows and enforces security protocols across the platform.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/Database/AdminLogger.php'>AdminLogger.php</a></b></td>
							<td style='padding: 8px;'>- Provides a centralized mechanism for logging administrative actions within the application, capturing details such as user identity, action specifics, IP address, and user agent<br>- Facilitates audit trails and activity tracking for security and operational oversight, integrating seamlessly with the database to store and retrieve logs as part of the overall systems monitoring and accountability architecture.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/Database/prihlasky.sql'>prihlasky.sql</a></b></td>
							<td style='padding: 8px;'>- Defines the database schema for race registration submissions, capturing detailed participant, vehicle, and consent information<br>- Serves as the foundational data structure for managing and storing entries related to race events, ensuring organized and consistent data collection across the application<br>- Facilitates efficient data retrieval and integrity within the overall system architecture.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/Database/prihlaskaUploadToDB.php'>prihlaskaUploadToDB.php</a></b></td>
							<td style='padding: 8px;'>- Handles the submission of race registration data by validating and inserting participant details into the database<br>- Ensures proper data collection for teams, drivers, co-drivers, and vehicle information, facilitating organized storage of race entries<br>- Supports the overall registration workflow within the application architecture, enabling efficient management of participant records.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/Database/EnvLoader.php'>EnvLoader.php</a></b></td>
							<td style='padding: 8px;'>- Facilitates environment configuration management by loading key-value pairs from a designated.env file into the applications runtime environment<br>- Ensures seamless access to environment variables across the codebase, supporting flexible deployment configurations and secure handling of sensitive data within the overall architecture.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/Database/db.php'>db.php</a></b></td>
							<td style='padding: 8px;'>- Establishes and manages the database connection for the application, ensuring secure and reliable access to the MySQL database using environment-configured credentials<br>- Facilitates seamless database interactions across the codebase by handling connection setup, error logging, and charset configuration, forming a foundational component for data persistence and retrieval within the overall architecture.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/back/Database/getPrihlasky.php'>getPrihlasky.php</a></b></td>
							<td style='padding: 8px;'>- Retrieves all registration entries from the database, ordered by submission date, and stores them in the user session<br>- Facilitates data transfer between backend and frontend components, enabling the display of registration information on the main page<br>- Supports the overall architecture by centralizing registration data management for user interface rendering.</td>
						</tr>
					</table>
				</blockquote>
			</details>
		</blockquote>
	</details>
	<!-- front Submodule -->
	<details>
		<summary><b>front</b></summary>
		<blockquote>
			<div class='directory-path' style='padding: 8px 0; color: #666;'>
				<code><b>⦿ front</b></code>
			<table style='width: 100%; border-collapse: collapse;'>
			<thead>
				<tr style='background-color: #f8f9fa;'>
					<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
					<th style='text-align: left; padding: 8px;'>Summary</th>
				</tr>
			</thead>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/Login.php'>Login.php</a></b></td>
					<td style='padding: 8px;'>- Facilitates user authentication by presenting a styled login interface within the web application<br>- Integrates session management to display error messages and directs login requests to backend processing<br>- Serves as the entry point for user access, ensuring secure and user-friendly authentication aligned with the overall architecture of the project.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/poradatele.php'>poradatele.php</a></b></td>
					<td style='padding: 8px;'>- Provides a web interface for authorized users to browse and download Word documents from a designated server directory<br>- Integrates user session management, role-based navigation, and security checks to ensure safe file access<br>- Serves as a central component for document distribution within the broader application architecture, supporting user engagement and administrative oversight.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/download_pdf.php'>download_pdf.php</a></b></td>
					<td style='padding: 8px;'>- Generates a comprehensive PDF report of all registration submissions by retrieving data from the database, formatting each entry with detailed participant and vehicle information, and providing a downloadable document for administrative review<br>- This functionality centralizes registration data into a structured, printable format, supporting efficient management and verification within the overall application architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/main_backup.php'>main_backup.php</a></b></td>
					<td style='padding: 8px;'>- Front/main_backup.php`This script serves as a foundational component for managing user session data and fallback content within the web applications front-end<br>- It primarily retrieves user-specific application data stored in the session, such as form submissions or preferences, and prepares a set of default images to ensure a seamless user experience in case of missing or unavailable carousel content<br>- Overall, it supports the application's resilience and personalization features by maintaining session continuity and providing fallback assets for the user interface.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/registrace.json'>registrace.json</a></b></td>
					<td style='padding: 8px;'>- Defines and manages registration data for a racing event, capturing participant and vehicle details along with consent and registration dates<br>- Integrates into the overall system to facilitate event organization, participant tracking, and data consistency across the application architecture<br>- Ensures structured storage of registration information to support event management workflows.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/race_date.txt'>race_date.txt</a></b></td>
					<td style='padding: 8px;'>- Defines the target race date for the application, serving as a key reference point within the overall project architecture<br>- It ensures consistent scheduling and timing across features that depend on the race date, facilitating accurate date calculations and event planning throughout the system.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/carousel_images.json'>carousel_images.json</a></b></td>
					<td style='padding: 8px;'>- Defines a collection of image URLs used for the websites homepage carousel, enabling dynamic and visually engaging content presentation<br>- Serves as a centralized resource within the project architecture to facilitate easy updates and consistent display of featured images across the site’s user interface.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/prihlaska.php'>prihlaska.php</a></b></td>
					<td style='padding: 8px;'>- The <code>front/prihlaska.php</code> file serves as the primary interface for race registration within the application<br>- Its main purpose is to facilitate user submissions of race participation data, capturing relevant details and associating them with the specific race date<br>- Upon form submission, it processes and stores the registration information in the user session, providing immediate feedback and redirecting users to the main page<br>- Overall, this file is central to the user registration workflow, enabling participants to sign up for upcoming races and ensuring their data is correctly linked to the event schedule.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/Login_backup.php'>Login_backup.php</a></b></td>
					<td style='padding: 8px;'>- Provides a user login interface for ASK Hořovice, enabling authentication through a form that submits credentials to the backend<br>- It integrates session management to display error messages and maintains a consistent, modern design aligned with the overall application architecture<br>- This component facilitates secure user access, serving as the entry point for authenticated interactions within the web platform.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/main.php'>main.php</a></b></td>
					<td style='padding: 8px;'>- Main.phpThis script serves as the entry point for the front-end interface, initializing user session data and preparing visual content for display<br>- Its primary role is to manage and supply a set of images—either user-defined carousel images stored in a JSON file or fallback images—to enhance the visual experience of the website<br>- Within the overall architecture, it ensures that the homepage consistently presents engaging imagery, contributing to a cohesive and dynamic user interface.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/imgs.php'>imgs.php</a></b></td>
					<td style='padding: 8px;'>- Manage and serve image assets within the web applications front-end by dynamically generating image references<br>- Ensures efficient handling of image resources, supporting seamless integration and display across the user interface, thereby contributing to a cohesive and visually consistent user experience within the overall project architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/prihlaska_backup.php'>prihlaska_backup.php</a></b></td>
					<td style='padding: 8px;'>- Facilitates user registration for a race event by collecting participant, vehicle, and emergency contact details through a web form<br>- Manages form submission, stores registration data in session variables, and redirects to a backend process for database storage<br>- Serves as the primary interface for race sign-ups within the overall application architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/update_carousel.php'>update_carousel.php</a></b></td>
					<td style='padding: 8px;'>- Manages carousel images and URLs for the websites homepage, enabling administrators to update visual content dynamically<br>- Handles image uploads, URL updates, and storage of carousel configuration, ensuring seamless content management<br>- Integrates with the overall site architecture by maintaining a JSON-based configuration, supporting flexible and secure updates to the homepage carousel.</td>
				</tr>
			</table>
			<!-- js Submodule -->
			<details>
				<summary><b>js</b></summary>
				<blockquote>
					<div class='directory-path' style='padding: 8px 0; color: #666;'>
						<code><b>⦿ front.js</b></code>
					<table style='width: 100%; border-collapse: collapse;'>
					<thead>
						<tr style='background-color: #f8f9fa;'>
							<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
							<th style='text-align: left; padding: 8px;'>Summary</th>
						</tr>
					</thead>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/js/main.js'>main.js</a></b></td>
							<td style='padding: 8px;'>- Main.jsThis file manages the navigation interface within the web applications frontend<br>- Its primary purpose is to dynamically highlight the active navigation item, enhancing user experience by providing clear visual cues about the current page or section<br>- By manipulating DOM elements and their styles, it ensures that navigation remains intuitive and responsive across different interactions and viewport changes, contributing to the overall usability and visual consistency of the application's user interface.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mir04ange/ASZhoroviceWebphp/blob/master/front/js/cursor.js'>cursor.js</a></b></td>
							<td style='padding: 8px;'>- Defines dynamic cursor behavior within the front-end interface, enhancing user interaction by switching to a custom SVG cursor during mouse clicks and reverting to default otherwise<br>- Integrates seamlessly into the overall architecture by providing visual feedback, contributing to an engaging and responsive user experience across the application.</td>
						</tr>
					</table>
				</blockquote>
			</details>
		</blockquote>
	</details>
</details>

---

## 🚀 Getting Started

### 📋 Prerequisites

This project requires the following dependencies:

- **Programming Language:** PHP
- **Package Manager:** Composer, Npm

### ⚙️ Installation

Build ASZhoroviceWebphp from the source and install dependencies:

1. **Clone the repository:**

    ```sh
    ❯ git clone https://github.com/Mir04ange/ASZhoroviceWebphp
    ```

2. **Navigate to the project directory:**

    ```sh
    ❯ cd ASZhoroviceWebphp
    ```

3. **Install the dependencies:**

**Using [composer](https://www.php.net/):**

```sh
❯ composer install
```
**Using [npm](https://www.npmjs.com/):**

```sh
❯ npm install
```

### 💻 Usage

Run the project with:

**Using [composer](https://www.php.net/):**

```sh
php {entrypoint}
```
**Using [npm](https://www.npmjs.com/):**

```sh
npm start
```

### 🧪 Testing

Run the test suite with:

**Using [composer](https://www.php.net/):**

```sh
vendor/bin/phpunit
```
**Using [npm](https://www.npmjs.com/):**

```sh
npm test
```

---

## 📈 Roadmap

- [X] **`Task 1`**: <strike>Implement feature one.</strike>
- [ ] **`Task 2`**: Implement feature two.
- [ ] **`Task 3`**: Implement feature three.

---

## 🤝 Contributing

- **💬 [Join the Discussions](https://github.com/Mir04ange/ASZhoroviceWebphp/discussions)**: Share your insights, provide feedback, or ask questions.
- **🐛 [Report Issues](https://github.com/Mir04ange/ASZhoroviceWebphp/issues)**: Submit bugs found or log feature requests for the `ASZhoroviceWebphp` project.
- **💡 [Submit Pull Requests](https://github.com/Mir04ange/ASZhoroviceWebphp/blob/main/CONTRIBUTING.md)**: Review open PRs, and submit your own PRs.

<details closed>
<summary>Contributing Guidelines</summary>

1. **Fork the Repository**: Start by forking the project repository to your github account.
2. **Clone Locally**: Clone the forked repository to your local machine using a git client.
   ```sh
   git clone https://github.com/Mir04ange/ASZhoroviceWebphp
   ```
3. **Create a New Branch**: Always work on a new branch, giving it a descriptive name.
   ```sh
   git checkout -b new-feature-x
   ```
4. **Make Your Changes**: Develop and test your changes locally.
5. **Commit Your Changes**: Commit with a clear message describing your updates.
   ```sh
   git commit -m 'Implemented new feature x.'
   ```
6. **Push to github**: Push the changes to your forked repository.
   ```sh
   git push origin new-feature-x
   ```
7. **Submit a Pull Request**: Create a PR against the original project repository. Clearly describe the changes and their motivations.
8. **Review**: Once your PR is reviewed and approved, it will be merged into the main branch. Congratulations on your contribution!
</details>

<details closed>
<summary>Contributor Graph</summary>
<br>
<p align="left">
   <a href="https://github.com{/Mir04ange/ASZhoroviceWebphp/}graphs/contributors">
      <img src="https://contrib.rocks/image?repo=Mir04ange/ASZhoroviceWebphp">
   </a>
</p>
</details>

---

<div align="left"><a href="#top">⬆ Return</a></div>

---
