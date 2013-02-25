Feature: Add New User
	In order to create new users
	As an administrator
	I am able to create new users

	Scenario: Create new user
		Given I am logged in as an administrator
		When I create a new user
		Then I should see "Created new user"
	
	Scenario: Login as new user
		Given I am logged in as an administrator
		When I create a new user, with "joe" and "123" as the username and password
		And I logout
		Then I should be able to login as "joe" with the password "123"
