# Deploying Laravel to Firebase Hosting (via Cloud Run)

To make your Laravel project live on Firebase, we use **Google Cloud Run** to host the dynamic PHP application and **Firebase Hosting** to serve it.

## Prerequisites

1.  **Google Cloud SDK** installed (`gcloud`).
2.  **Firebase CLI** installed (`firebase`).
3.  A Firebase project created in the [Firebase Console](https://console.firebase.google.com/).

## Step 1: Login and Setup

Login to your accounts:

```bash
gcloud auth login
firebase login
```

Set your active project (replace `YOUR_PROJECT_ID` with your actual Firebase project ID):

```bash
gcloud config set project YOUR_PROJECT_ID
firebase use YOUR_PROJECT_ID
```

## Step 2: Deploy to Cloud Run

Deploy your containerized Laravel app to Cloud Run. This builds the Dockerfile and runs it.

*Note: You must generate a robust APP_KEY and set your database credentials here.*

```bash
gcloud run deploy buy-shop-backend \
  --source . \
  --region us-central1 \
  --allow-unauthenticated \
  --set-env-vars="APP_KEY=base64:YourAppKeyHere,APP_DEBUG=false,APP_ENV=production"
```

*If you have a database (like Cloud SQL), add the connection details to `--set-env-vars`.*

## Step 3: Deploy to Firebase Hosting

Once the backend is running, deploy the hosting configuration which points to it.

```bash
firebase deploy --only hosting
```

Your app will now be live at your Firebase Hosting URL (e.g., `https://your-project.web.app`).

## Notes

-   **Environment Variables**: Ensure all your `.env` variables (Database, Payment Gateways, Mail) are added to the `--set-env-vars` flag in the `gcloud run deploy` command.
-   **Database**: If you use MySQL/PostgreSQL, you should use **Google Cloud SQL** and connect it using the Cloud Run Unix socket or Private IP.
-   **Storage**: Files uploaded to `storage` are ephemeral in Cloud Run (they vanish when the container restarts). You should configure Laravel to use **Google Cloud Storage** driver (`filesystems.php`) for persistent uploads.
