Feature: Create course
  In order to be the best youtuber ever
  As a codelyver
  I want to create a course

  Scenario: Create a course
    Given I send a POST request to "/course" with body:
    """
    {
      "request_id": "170cfccd-869d-414b-a521-9cce9e0e67a2",
      "id": "f5fa4b43-8e10-41de-85c8-2ffa28916758",
      "title": "This is a title",
      "description": "This is a description"
    }
    """
    Then the response should be empty
    And the response status code should be 201