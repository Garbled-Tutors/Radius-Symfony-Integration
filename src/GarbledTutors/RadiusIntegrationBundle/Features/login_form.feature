Feature: User Authentication
	In order prevent unauthorized access
	As a user
	I should not be able to view any pages until I login

	Scenario: Try to access restricted pages
		Given I am not logged in
		When I am on "/"
		Then I should see "Login"

	Scenario: When I am not logged in, non existant pages should redirect to login
		Given I am not logged in
		When I am on "/non/existant/page"
		Then I should see "Login"

	Scenario: Login and access restricted page
		Given I am logged in as an administrator
		When I am on "/"
		Then I should not see "Login"
