Feature: Login Form
	In order prevent unauthorized access
	As an administrator
	I am unable to view any pages, besides the login form, until I login

	Scenario: Try to access restricted pages
		Given I am not logged in
		When I am on "/"
		Then I should see "Login"

	Scenario: Login and access restricted page
		Given I am logged in as "admin"
		When I am on "/"
		Then I should not see "Login"
