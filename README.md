# Des Touch

Portfolio site for Des Touch, the brand of photographer and cinematographer Teddy Sukpa. Plain PHP with no database, so it runs on ordinary shared hosting.

## Preview on your computer

```
C:\xampp\php\php.exe -S localhost:8000 router.php
```

Then open http://localhost:8000.

## Add a project

1. Put the photos in `originals/` with simple names, such as `ada-1.jpg`.
2. Run `C:\xampp\php\php.exe tools/optimize-images.php` to create the small web versions.
3. In `app/projects.php`, copy a project block and change its details.
4. Add the project's name to `FEATURED_PROJECTS` if it should appear on the home page.

Videos go on YouTube or Vimeo. Add them to a project with `'video' => ['youtube', 'VIDEO_ID']`.

## Before launch

- [ ] Add the WhatsApp number and social links in `app/config.php`
- [ ] Replace every sample project and image, then delete `sample-*` files from `originals/` and `assets/img/`
- [ ] Add the showreel, Teddy's photo and his bio
- [ ] Set `SAMPLE_MODE` to `false` and fill in `SITE_URL`

## Upload to hosting

Upload everything except `originals/`, `tools/`, `router.php` and the `.md` files. Keep `images/logo-white.PNG`; it is used by the site header and footer.

## Deploy to Vercel

The site uses PHP and Apache. The root `Dockerfile` packages it for Vercel's Container runtime. Connect this repository to Vercel and select the Container framework preset if prompted. Vercel Container is currently in beta.
