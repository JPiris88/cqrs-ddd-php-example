Feature: Create video
  In order to be the best youtuber ever
  As a codelyver
  I want to create a video

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

    Given  I send a POST request to "/course" with body:
    """
    {
      "request_id": "b73de39c-2376-4bbd-b6b6-5ffba2515537",
      "id": "48c2c2ea-bd93-4248-9f71-81ad37ad5647",
      "title": "This is an another title",
      "description": "This is an another description"
    }
    """
    Then the response should be empty
    And the response status code should be 201

  Scenario: Create an screencast video
    Given  I send a POST request to "/video" with body:
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

  Scenario: Create an interview video
    Given  I send a POST request to "/video" with body:
    """
    {
      "request_id": "6ee07c6b-a1e7-4cfa-abf5-cbfd4884cd75",
      "id": "87cf6e20-a79b-4f0e-bf26-4a69de0cafe1",
      "title": "Entrevista Raúl Raja - CTO 47 Degrees",
      "url": "https://codely.tv/entrevistas/raul-raja-cto-47-degrees/",
      "type": "interview",
      "course_id": "48c2c2ea-bd93-4248-9f71-81ad37ad5647",
      "created_on": "2019-08-14 10:15:00"
    }
    """
    Then the response should be empty
    And the response status code should be 201
