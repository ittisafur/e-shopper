## E-Shopper Ecommerce
E-shopper is a free template can be found [here](https://themehunt.com/item/1524993-eshopper-free-ecommerce-html-template):
## Getting Started
- `php artisan migrate --seed`.
- `php artisan voyager:install` - else you won't be able to go to yourdomain.com/admin.
- `php artisan voyager:admin your@email.com --create`.

## Email and Notifications
I used sendgrid, get the Api Secret and set it in `MAIL_PASSWORD` and the `MAIL_USERNAME=apikey`. You are now set to use mailing system.
##### Contact Form Mailing
Change `DEFAULT_MAIL_TO` your email address or your destination.
## Queueing mail
Currently the notifcation can be queued.
- Make sure to change `QUEUE_CONNECTION` from `sync` to `database`.
- Run `php artisan queue:work` in a new terminal tab.

### Using Socialite

The application comes with only facebook login feature currently. Get your client_id and client_secret from [here](https://developers.facebook.com/).
- Add `FB_CLIENT_ID` and `FB_CLIENT_SECRET`

### Using Stripe

Get your stripe key and secret from stripe from [here](https://dashboard.stripe.com/test/apikeys) 

- Add your `STRIPE_KEY` and `STRIPE_SECRET`. 

Now you are good to go.
## License

This is an open-source project under the [MIT license](https://opensource.org/licenses/MIT).
