         .logo{
        height: 80px;
        width: 88px;
        margin: auto;
        }
        body{
            margin: 0;
            padding: 0;
        }
        .nav{
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
            background-color: #31ac0d;
            color: white;
            padding: 2px 2px;
            margin-bottom: 30px;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 90%;
            margin: auto;
        }
    </style>
    <script>
        // Create a new link element
        var faviconLink = document.createElement('link');
        faviconLink.rel = 'shortcut icon';
        faviconLink.href = 'assets/favicon/favicon.ico';
        faviconLink.type = 'image/x-icon';

        // Get the head element
        var head = document.head || document.getElementsByTagName('head')[0];

        // Insert the favicon link element before the title element
        var titleElement = document.querySelector('title');
        head.insertBefore(faviconLink, titleElement);
  </script>
</head>
<body>
    <div class="nav">
        <div>
            <img  class="logo" src="assets/pics/logo.png" alt="logo">
        </div>
        <div>
            <h3>Transit Men's Hostel 1</h3>
        </div>
        <div>
        <h4>Mess Fees Management System</h4>
        </div>
    </div>