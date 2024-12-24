

# Test task 

Test task for the position of Frontend Developer.

## Task description
- Install WordPress on [hosting](https://wphost.me/) (Start plan).
- Create a popup based on the design from Figma [link](https://www.figma.com/design/rBpdZNGe6zcdPsYWTQktYy/Popap-TZ?node-id=1-10481&t=RWq2IZItYSd5E2TH-1)
Implement: mobile and desktop views for the 1st and 2nd steps of the popup.
- Popup logic: subscription data should be stored in the WordPress admin panel.
It is not mandatory, but it would be a plus if the subscription data is transmitted via API to a subscription service. This can be any service.
- After completing the task, provide access to the admin panel for review (link, username, and password).

## Screenshots
Desktop, step 1

![Screenshot 2024-12-24 at 10 57 57](https://github.com/user-attachments/assets/ef78c295-4934-45e1-927d-8132d1e84176)

Desktop, step 2

![image](https://github.com/user-attachments/assets/21b0c4c0-831f-40f7-abec-b4efe93bf899)

Mobile, step 1

![image](https://github.com/user-attachments/assets/b662251e-d75f-4f38-a948-9ece51cd369a)

Mobile, step 2

![image](https://github.com/user-attachments/assets/1e8dccbc-10ee-4a70-b4ec-30b2828904a8)

## Implementation

To implement this task, I used the Starter Theme for WordPress from [Underscores](https://underscores.me/). The email addresses of users who filled out the form are saved in the created CPT "Subscribers". The popup itself was implemented as a shortcode and is added to the page using `[subscription_popup]`. All the WordPress logic required for this task is written inside the `functions.php` file. The JS and styles needed for the popup display are located inside the `src` folder.

## Technologies Used

- HTML (PHP)
- CSS (SCSS)
- JS (Vanilla)
- Webpack

## How to run FE build

Project uses Webpack 5, to run, simply do this in the repository root: `npm install` and `npm run dev`. The last command is to start a development server that watches for file changes and automatically reloads the application.

## Other tasks

```bash

# Install dependencies
npm install

# build for production with minification
npm run build

```

## How to configure?

To use locally, you need to install WordPress by downloading the archive from the official website, link the local database to the site, and then transfer the theme files available in this repository.



