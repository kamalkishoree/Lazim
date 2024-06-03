# AppTunix Test Project

This repository contains the code for the AppTunix test project. Below are the instructions for setting up and running the project for both web and API:

## Web

1. Clone the repository:

2. Install dependencies:
   git clone https://github.com/kamalkishoree/apptunix-test.git

3. Install dependencies:
   php artisan passport:install

4. Run database migrations:
   php artisan migrate

5. Navigate to the index page in your browser.

6. Use the signup feature to create an account.

7. Log in to your account.

8. Add Item To your cart and Click the card from header to view your Items.

## API

For API documentation and testing, please refer to the following Postman collection:

[AppTunix Test Postman Collection](https://api.postman.com/collections/30683777-e371c409-c53e-4357-90d0-0f873d421495?access_key=PMAT-01HXV8J31WNK4RENT4MWBQ9BX0)

Before using the collection, ensure you have set up the project locally and replaced the `staging_url` variable in the collection with your localhost URL.

### Endpoints:

-   **Login:** `{{url}}/api/login`
-   **Logout:** `{{url}}/api/logout`
-   **Create Product:** `{{url}}/api/task/create`
-   **List Products:** `{{url}}/api/tasks`
-   **View Product:** `{{url}}/api/task/{{id}}`
-   **Edit Product:** `{{url}}/api/task/edit/{{id}}`
-   **Delete Product:** `{{url}}/api/task/delete/{{id}}`

Note: Product operations can only be performed via the API. The front-end only implements user session-based cart functionality.
