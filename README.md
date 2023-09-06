# User-management-system
User management system (with the roles). Webbase and API base system. Developed in Laravel, jQuery, mySql, Html, CSS(Bootstrap) 

Description: Implement an API authentication and authorization system in Laravel for a web
application. The system should ensure secure access to API endpoints and control user
permissions based on their roles.

User management system in Laravel by implementing role-based
authorization. The following project implemented to allow different users to update or
delete users based on their roles:

User Roles and Permissions:

● Define three user roles: admin, manager, and regular user.

● Create a “roles” table in the database and populate it with the predefined roles.

● Assign appropriate permissions to each role. For example, only the admin should be
able to update or delete any user, the manager should have the privilege to update or
delete regular users, and regular users should only be able to update their own profile.
User Listing:

● Create an API endpoint that retrieves a list of all users.

● Ensure that only admin and manager users have access to this endpoint.

● Return the list of users along with their relevant information.
User Update:

● Implement an API endpoint that allows updating user information.

● Implement authorization checks to ensure that only authorized users can update user
details.

● Allow admin users to update information for any user.

● Allow managers to update information for regular users.

● Regular users should be able to update their own profile information.
User Deletion:

● Develop an API endpoint that enables deleting user accounts.

● Implement authorization checks to ensure that only authorized users can delete user
accounts.

● Allow admin users to delete any user account.

● Allow managers to delete accounts of regular users.

● Regular users should not have permission to delete user accounts.

Additionally, create a job in Laravel that runs periodically to delete users who have been
blocked for 48 hours or longer. Also, notify the user via email one day before deleting their account.
