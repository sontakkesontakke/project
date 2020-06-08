<html>
  <head>

  </head>
  <body>
    <h1><a href="#" id="login">login</a></h1>
    <h1><a href="#" id="logout">logout</a></h1>
    <h1><a href="#" id="get-node-1">get node 1</a></h1>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script type="text/javascript">
      (function($) {

        this.csrfToken = '';
        this.logoutToken = '';

        this.$ = $;
        this.$('#login').click(() => {
          this.$.ajax({
            url: 'http://www.octo2.dev/d8_2_cors/user/login?_format=json',
            method: 'POST',
            data: JSON.stringify({
              name: 'admin',
              pass: 'pass'
            }),
            contentType: 'application/json',
            dataType: 'json',
            /*xhrFields: {
               withCredentials: true
            }, */
            crossDomain: true
          })
          .then(res => {
            console.log('RES =>', res);
            this.csrfToken = res.csrf_token;
            this.logoutToken = res.logout_token;
          });
        });

        this.$('#logout').click(() => {
          this.$.ajax({
            url: `http://www.octo2.dev/d8_2_cors/user/logout?_format=json&token=${this.logoutToken}`,
            method: 'POST',
            xhrFields: {
               withCredentials: true
            },
            crossDomain: true
          })
          .then(res => console.log(res + "no error"))
          .catch(err => console.log(err));
        });

        this.$('#get-node-1').click(() => {
          this.$.ajax({
            url: `http://www.octo2.dev/d8_2_cors/node/1?_format=hal_json`,
            method: 'GET',
            xhrFields: {
               withCredentials: true
            },
            crossDomain: true
          })
          .then(res => console.log(res ))
          .catch(err => console.log(err));
        });

      })(window.$);
    </script>
  </body>
</html>
