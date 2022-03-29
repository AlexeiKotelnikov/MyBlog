# MyBlog - Functional and Pure PHP Ready to use MVC structure

This is a personal project I made to teach myself how MVC works so I can use it for future projects. This is a parody of a multiplayer blog.  It is possible to register multiple users and each user can create/edit/delete only his own articles. A personal account of the user is implemented. The output of articles by categories. Logging. Some of the topics I learnt by doing this:

<ul dir="auto">
<li>MVC pattern</li>
<li>SQL injection and security basics</li>
<li>Human-readable URLs and Configure htaccess</li>
<li>Easy authorization scheme</li>
<li>Handling databases with PDO</li>
</ul>

<h2 dir="auto"><a id="user-content-installation" class="anchor" aria-hidden="true" href="#installation"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Installation</h2>


<ol dir="auto">
<li>Download as .zip or clone this repo using<br>
<code>git clone https://github.com/AlexeiKotelnikov/MyBlog.git</code></li>
<li>Import the <code>data/MyBlog.sql</code> file to phpMyAdmin</li>
<li>Start your Apache server and go to <a href="http://localhost/MyBlog" rel="nofollow">http://localhost/MyBlog</a></li>
</ol>

<h2 dir="auto"><a id="user-content-project-structure" class="anchor" aria-hidden="true" href="#project-structure"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path></svg></a>Project structure</h2>

  <div class="snippet-clipboard-content position-relative overflow-auto"><pre><code>MyBlog/
    controllers/        # Controller
    core/               # Utility functions
    data/               # SQL database file
    db/                 
        visits/         # Logs  
    model/              # Model 
    src/               
        css/            # Compiled css file
    views/              # Views
    index.php           # Starting point for the entire app
    .htaccess           # Make folders unaccessible for users and Redirect everything to index.php
    init.php            # Database credentials, constants used frequently
    routes.php          # Router
</code></pre><div class="zeroclipboard-container position-absolute right-0 top-0">
    <clipboard-copy aria-label="Copy" class="ClipboardButton btn js-clipboard-copy m-2 p-0 tooltipped-no-delay" data-copy-feedback="Copied!" data-tooltip-direction="w" value="MyBlog/
    controllers/        # Controller 
    db/                 # Utility functions
    data/               # SQL database file
    db/                
        visits/         # Logs  
    model/              # Model 
    src/               
        css/            # Compiled css file
    views/              # Views
    index.php           # Starting point for the entire app
    .htaccess           # Make folders unaccessible for users and Redirect everything to index.php
    init.php            # Database credentials, constants used frequently
    routes.php          # Router
      <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-copy js-clipboard-copy-icon m-2">
    <path fill-rule="evenodd" d="M0 6.75C0 5.784.784 5 1.75 5h1.5a.75.75 0 010 1.5h-1.5a.25.25 0 00-.25.25v7.5c0 .138.112.25.25.25h7.5a.25.25 0 00.25-.25v-1.5a.75.75 0 011.5 0v1.5A1.75 1.75 0 019.25 16h-7.5A1.75 1.75 0 010 14.25v-7.5z"></path><path fill-rule="evenodd" d="M5 1.75C5 .784 5.784 0 6.75 0h7.5C15.216 0 16 .784 16 1.75v7.5A1.75 1.75 0 0114.25 11h-7.5A1.75 1.75 0 015 9.25v-7.5zm1.75-.25a.25.25 0 00-.25.25v7.5c0 .138.112.25.25.25h7.5a.25.25 0 00.25-.25v-7.5a.25.25 0 00-.25-.25h-7.5z"></path>
</svg>
      <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-check js-clipboard-check-icon color-fg-success m-2 d-none">
    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
</svg>
    </clipboard-copy>
  </div></div>
