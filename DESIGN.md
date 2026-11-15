---
name: Des Touch
description: The portfolio of photographer and cinematographer Teddy Sukpa, where every shoot gets its own poster.
colors:
  ink: "#0b0b0b"
  white: "#ffffff"
  lens-lime: "#d2e65a"
  poster-red: "#c8102e"
  poster-blue: "#1226a8"
  marigold: "#ffc20e"
  whatsapp-green: "#0b7a3b"
typography:
  display:
    fontFamily: "Bowlby One, Arial Black, sans-serif"
    fontSize: "clamp(2.9rem, 9.5vw, 8.5rem)"
    fontWeight: 400
    lineHeight: 0.98
    letterSpacing: "-0.015em"
  label:
    fontFamily: "Barlow Condensed, Arial Narrow, sans-serif"
    fontSize: "1.25rem"
    fontWeight: 700
    lineHeight: 1
    letterSpacing: "0.03em"
  body:
    fontFamily: "Barlow, Segoe UI, sans-serif"
    fontSize: "1.125rem"
    fontWeight: 400
    lineHeight: 1.55
rounded:
  none: "0"
spacing:
  gutter: "clamp(16px, 4vw, 56px)"
  section: "clamp(72px, 11vw, 160px)"
components:
  button-whatsapp:
    backgroundColor: "{colors.whatsapp-green}"
    textColor: "{colors.white}"
    typography: "{typography.label}"
    rounded: "{rounded.none}"
    padding: "17px 26px"
---

# Design System: Des Touch

## Overview

**Creative North Star: "Now Showing"**

The visual world comes from hand-lettered Nollywood video-club posters, disciplined by the Des Touch logo. Every job, from a wedding to a brand film, is presented as a feature with its own poster: one image, one huge title and the credit "Shot by Des Touch".

The brand's black, white and lens lime own the page. Poster colours appear only on title bands, so browsing feels like a cinema lobby rather than a crowded stall. An open project is mostly the work itself.

**Key Characteristics:**
- One image and two pieces of text on every poster
- Heavy display lettering at very large scale
- Whole sections in a single flat colour
- Square printed sheets with hard offset shadows
- The lime lens dot from the logo as the recurring marker

## Colors

The logo sets the palette, with three poster colours held in reserve.

### Primary
- **Ink:** main ground for the work, project pages and footer.
- **White:** text on dark, and quiet sections such as About.
- **Lens Lime:** the logo's dot, used as a full section ground and for active states.

### Secondary
- **Poster Red, Poster Blue, Marigold:** poster title bands. Marigold may also carry a closing section.

### Tertiary
- **WhatsApp Green:** reserved for WhatsApp actions, so booking is always recognisable.

**The Untouched Work Rule.** Colour surrounds the work and never tints, filters or recolours a photograph or film. The only exception is the dark scrim needed to keep showreel text readable.

## Typography

**Display Font:** Bowlby One
**Lettering Fonts:** Shrikhand (romance), Alfa Slab One (slab), used for poster titles only
**Label Font:** Barlow Condensed
**Body Font:** Barlow

**Character:** Display and lettering faces feel painted by a sign writer. The condensed labels read like printed film credits.

**The Lettered Title Rule.** Each project picks one of three lettering styles to suit its mood. Titles stay real text, and the `fit` value keeps them inside the poster.

## Layout

The poster is the main unit. Walls run three columns with the middle column dropped, then two, then one on phones. Project pages open on the poster, then give way to large runs of images: landscape images at full width and portrait images in pairs. All fonts are self-hosted, and images load through responsive WebP sets.

## Elevation & Depth

Depth comes from printed layering. Posters sit on hard offset shadows in black or lime with no rounding, and lift slightly on hover as they straighten.

## Shapes

Everything is square-cut. The only circle in the system is the lens dot from the logo.

## Components

### Poster
Image, colour band, lettered title and credit line. Bands share a fixed title height so posters align. The same poster morphs from the wall into its project page through a view transition.

### Buttons
WhatsApp buttons are green, uppercase condensed labels with a hard offset shadow. A floating version stays on every page, and its message changes with the type of work being viewed.

### Navigation
Three uppercase links with no hamburger menu, and a lens dot under the current page. The logo sits on the left, except on the home page, where the showreel carries it at full size.

## Do's and Don'ts

### Do:
- **Do** give every project a title and the credit "Shot by Des Touch".
- **Do** use `assets/img/logo.svg` for the logo and keep its lime dot unchanged.
- **Do** keep project pages mostly the work, so the style also suits corporate clients.

### Don't:
- **Don't** add slogans, collages or extra text to a poster.
- **Don't** cover faces or key moments in the work with type.
- **Don't** invent film credits, client names, awards or testimonials.
- **Don't** use poster red, blue or marigold for interface controls.
