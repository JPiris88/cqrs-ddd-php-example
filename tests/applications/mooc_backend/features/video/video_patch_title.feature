Feature: Update a video title
  In order to be the best youtuber ever
  As a codelyver
  I want to update a video title

  Background:
    Given  I send a POST request to "/course" with body:
    """
    {
      "request_id": "170cfccd-869d-414b-a521-9cce9e0e67a2",
      "id": "9c8a481a-0fe2-49cf-ab8a-79bcc2965d00",
      "title": "This is a title",
      "description": "This is a description"
    }
    """
    Then the response should be empty
    And the response status code should be 201
    Given I send a POST request to "/video" with body:
    """
    {
      "request_id": "170cfccd-869d-414b-a521-9cce9e0e67a2",
      "id": "465892a1-5a77-4cee-9450-46ecd6b68f69",
      "title": "Exprimiendo los tipos de PHP7",
      "url": "https://codely.tv/screencasts/tipos-php-7/",
      "type": "screencast",
      "course_id": "9c8a481a-0fe2-49cf-ab8a-79bcc2965d00",
      "created_on": "2019-08-14 10:15:00"
    }
    """
    Then the response should be empty
    And the response status code should be 201

  Scenario: Update a video title
    Given  I send a PATCH request to "/video" with body:
    """
    {
      "request_id": "170cfccd-869d-414b-a521-9cce9e0e67a2",
      "id": "465892a1-5a77-4cee-9450-46ecd6b68f69",
      "title": "Nuevo título"
    }
    """
    Then the response should be empty
    And the response status code should be 200