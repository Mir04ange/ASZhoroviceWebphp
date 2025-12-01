SECURITY SETUP - ENVIRONMENT VARIABLES
======================================

OVERVIEW
--------
Database credentials are now stored in a .env file instead of hardcoded in the source code.
This prevents credentials from being exposed in version control and improves security.

FILES CREATED
-------------

1. .env (ROOT DIRECTORY)
   - Contains all sensitive configuration
   - Example:
     DB_HOST=a066um.forpsi.com
     DB_USER=f191879
     DB_PASS=gSB6x.s8
     DB_NAME=f191879
     DB_CHARSET=utf8mb4

2. .gitignore (ROOT DIRECTORY)
   - Prevents .env from being committed to git
   - Prevents node_modules, vendor, logs from being tracked
   - Protects sensitive files and directories

3. back/Database/EnvLoader.php
   - Utility class for loading and accessing environment variables
   - Methods:
     * load($path) - Load .env file
     * get($key, $default) - Get environment variable
     * getAll() - Get all variables

4. back/Database/db.php (UPDATED)
   - Now loads credentials from .env file
   - Validates all required credentials exist
   - Better error messages

SECURITY BENEFITS
------------------
✅ Credentials not in version control
✅ Different credentials for different environments (dev/prod)
✅ Easy credential rotation without code changes
✅ Prevents accidental credential exposure in git history
✅ Works with CI/CD pipelines
✅ Better for team collaboration (no shared passwords in code)

HOW TO USE
----------

1. Make sure .env file exists in root directory with your credentials:
   - Copy example above to your .env file
   - Set your actual database credentials

2. The db.php file automatically loads from .env when included

3. If .env is missing, you'll see a clear error message

4. Never commit .env to git - it's in .gitignore

ENVIRONMENT SETUP FOR DIFFERENT SERVERS
----------------------------------------

Development:
   Create .env with development database credentials

Production:
   Create .env with production database credentials
   (Never use same credentials as development)

Testing:
   Create .env.testing with test database credentials (optional)

MIGRATING EXISTING CODE
-----------------------

No changes needed! All existing code continues to work because:
- db.php is the only file that needs updating (already done)
- All other files already require db.php
- The connection object ($conn) is the same

All credentials are now securely managed through environment variables.
