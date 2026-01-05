{ pkgs, ... }: {
  channel = "stable-23.11"; # or "unstable"
  packages = [
    pkgs.php82
    pkgs.php82Packages.composer
    pkgs.nodejs_20
    pkgs.mysql80
    pkgs.redis
  ];

  env = {
    # Environment variables to set for your server
    # PORT = "8000"; 
  };

  idx = {
    # Search for the extensions you want on https://open-vsx.org/ and use "publisher.id"
    extensions = [
      "bmewburn.vscode-intelephense-client"
      "onecentlin.laravel-blade"
      "shufo.vscode-blade-formatter"
    ];

    # Enable previews and customize configuration
    previews = {
      enable = true;
      previews = {
        web = {
          command = ["php" "artisan" "serve" "--host=0.0.0.0" "--port=$PORT"];
          manager = "web";
        };
      };
    };

    # Workspace lifecycle hooks
    workspace = {
      # Runs when a workspace is first created
      onCreate = {
        # Open editors for the following files by default, if they exist:
        default.openFiles = [ "README.md" "resources/views/welcome.blade.php" ];
        
        # Install PHP dependencies
        composer-install = "composer install";
        
        # Install Node dependencies
        npm-install = "npm install";
        
        # Copy .env.example to .env
        setup-env = "[ -f .env ] || cp .env.example .env";
        
        # Generate application key
        key-generate = "php artisan key:generate";
      };
      
      # Runs when the workspace is (re)started
      onStart = {
        # Start database if needed, etc.
      };
    };
  };
}
