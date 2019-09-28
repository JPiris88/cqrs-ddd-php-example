Feature: Find a course
  In order to be the best youtuber ever
  As a codelyver
  I want to find a course

  Background:
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

  Scenario: Find an existing course
    Given I send a GET request to "/course/f5fa4b43-8e10-41de-85c8-2ffa28916758"
    Then the response status code should be 200
    And the response content should be:
    """
    {
      "id": "f5fa4b43-8e10-41de-85c8-2ffa28916758",
      "title": "This is a title",
      "description": "This is a description"
    }
    """

  Scenario: Not find a non existing course
    Given I send a GET request to "/course/09acb178-0831-4d86-a364-bff0e19d8f19"
    Then the response status code should be 404
    And the response content should be:
    """
    {
      "code": "course_not_found",
      "message": "The course <09acb178-0831-4d86-a364-bff0e19d8f19> has not been found"
    }
    """
