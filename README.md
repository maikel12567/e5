# E5 - Makersworld

## Code Conventions

-   Tabs for indentations
-   Tailwind in .scss file
-   Naming
    -   Controllers: Singular (Ex: ArticleController)
    -   Model: Singular (Ex: Article)
    -   Route: Plural (Ex: Articles/1)
    -   View: kebab-case (Ex: create-article.blade.php)
    -   Variable: camelCase (Ex: articleTitle)

# How to start using this project

1. Fork this project from github
2. Put it in your desired folder
3. Open your ternimal
4. Do a <code>composer install</code>
5. Do a <code>copy .env.example .env</code>
6. Edit the .env to fit your information
7. Open your ternimal again, and fill out these commands

    - <code>php artisan key:generate</code>
    - <code>php artisan migrate</code>
    - <code>php artisan migrate:fresh --seed</code>
    - <code>npm install</code>
    - <code>npm run dev</code>
    - <code>php artisan serve</code>

