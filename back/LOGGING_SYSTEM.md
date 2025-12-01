ADMIN LOGGING SYSTEM
====================

OVERVIEW
--------
Complete audit trail system that logs all admin activities with detailed information.

DATABASE SCHEMA
---------------
Table: admin_logs
- id_log: Auto-increment primary key
- user_id: Foreign key to loginsystem table
- username: Username of the admin
- action: Type of action performed
- action_details: Detailed description of what was done
- ip_address: IP address of the admin
- user_agent: Browser/client information
- timestamp: When the action occurred (auto-set to current time)
- status: success/failed
- error_message: Any error that occurred

FILES MODIFIED
--------------

1. Database/logs.sql
   - SQL schema for creating admin_logs table
   - Already created with proper indexes

2. Database/AdminLogger.php (NEW)
   - Logger class for all logging operations
   - Methods:
     * log($action, $details, $status, $error_message)
     * getLogs($limit, $action)
     * getUserLogs($user_id, $limit)

3. back/login.php
   - Logs successful login attempts
   - Logs failed login attempts with reason

4. back/logout.php
   - Logs when admin logs out

5. back/update_carousel.php
   - Logs carousel image updates with count

6. back/update_date.php
   - Logs race date updates with new date
   - Logs validation failures

7. back/delete_prihlaska.php
   - Logs deleted registrations with team name and ID

8. back/updateZaplaceno.php
   - Logs payment status updates with team name

9. back/view_logs.php (NEW)
   - Admin panel to view all logs
   - Filter by action type
   - Shows IP addresses, timestamps, and status

LOGGED ACTIONS
--------------
- LOGIN: Successful user login
- LOGIN_FAILED: Failed login with reason
- LOGOUT: User logout
- CAROUSEL_UPDATE: Image uploads
- RACE_DATE_UPDATE: Race date changes
- REGISTRATION_DELETE: Registration deletions
- PAYMENT_STATUS_UPDATE: Payment status changes
- VIEW_LOGS: Access to logs page

ACCESSING LOGS
--------------
Navigate to: /back/view_logs.php
- Only admins can access
- Access is also logged
- Filter logs by action type
- View IP address, timestamp, and status for each action

SECURITY FEATURES
-----------------
- IP address tracking
- User agent logging (browser info)
- Role-based access control
- Detailed error messages
- Timestamps on all entries
- Foreign key constraints
- Indexed for fast queries
