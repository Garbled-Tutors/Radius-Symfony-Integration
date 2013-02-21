Feature: Add New User
	In order to create new users
	As an administrator
	I am able to create new users

	Scenario: Create new user
		Given I am on "/radcheck/new"
		When I fill in "Username" with "joe"
		And I fill in "Password" with "secure"
		And I fill in "Password Repeat" with "secure"
		And I press "Create"
		Then I should see "Created new user"
