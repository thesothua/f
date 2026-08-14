# Furrydom India — Typography Improvement Plan

## 1. Purpose

This document defines a practical typography improvement plan for the Furrydom India public website and Admin Panel.

The objective is to create a consistent, responsive, accessible, and maintainable typography system across the existing React application without unnecessarily changing the visual identity.

> **Important:** This document is an implementation blueprint. Existing source code should be audited before values are applied globally.

---

# 2. Current Context

The project uses:

- React.js
- Vite
- React Router
- Laravel REST API
- PostgreSQL
- React Admin Panel
- Tailwind CSS and/or existing CSS styles

The public website is the primary focus.

The Admin Panel should have its own consistent UI typography, especially if Ant Design is being used.

---

# 3. Main Typography Problems to Address

The implementation should identify and eliminate:

- Different font families used for the same purpose
- Random font sizes such as `17px`, `19px`, `21px`, `23px`, etc.
- Inconsistent heading sizes
- Inconsistent font weights
- Inconsistent line heights
- Inconsistent letter spacing
- Excessive use of arbitrary Tailwind values such as `text-[43px]`
- Inline typography styles
- Different typography for visually identical components
- Poor mobile heading scaling
- Poor paragraph readability
- Excessive font-weight variations
- Unnecessary font files and weights
- Typography that causes layout shifts during font loading

---

# 4. Typography Design Principles

The new system should follow these principles:

1. Use a limited number of font families.
2. Use a controlled type scale.
3. Use semantic typography roles.
4. Keep heading hierarchy consistent.
5. Use responsive typography.
6. Use comfortable body line-height.
7. Avoid arbitrary font sizes where a design token already exists.
8. Keep typography accessible.
9. Minimize unnecessary font weights.
10. Keep public website typography visually consistent across all pages.

---

# 5. Recommended Typography Roles

Create the following semantic roles:

| Role | Purpose |
|---|---|
| Display | Large hero statements |
| H1 | Main page heading |
| H2 | Major section heading |
| H3 | Subsection heading |
| H4 | Card/component heading |
| Body Large | Introductory content |
| Body | Normal paragraph text |
| Body Small | Supporting information |
| Caption | Metadata/helper information |
| Label | Form and UI labels |
| Button | CTA/button text |
| Navigation | Header/footer navigation |

These roles should be used instead of choosing a new font size for each component.

---

# 6. Recommended Type Scale

Use the following as the initial design-system proposal.

The exact values should be compared against the current design before implementation.

## Desktop

| Token | Size | Line Height | Weight |
|---|---:|---:|---:|
| Display | 56px | 64px | 700 |
| H1 | 48px | 56px | 700 |
| H2 | 36px | 44px | 700 |
| H3 | 28px | 36px | 600 |
| H4 | 22px | 30px | 600 |
| Body Large | 18px | 28px | 400 |
| Body | 16px | 26px | 400 |
| Body Small | 14px | 22px | 400 |
| Caption | 12px | 18px | 400 |
| Label | 14px | 20px | 500 |
| Button | 15px | 20px | 600 |
| Navigation | 15px | 22px | 500 |

## Tablet

| Token | Size | Line Height |
|---|---:|---:|
| Display | 48px | 56px |
| H1 | 42px | 50px |
| H2 | 32px | 40px |
| H3 | 26px | 34px |
| H4 | 21px | 29px |
| Body Large | 18px | 28px |
| Body | 16px | 25px |

## Mobile

| Token | Size | Line Height |
|---|---:|---:|
| Display | 38px | 46px |
| H1 | 34px | 42px |
| H2 | 28px | 36px |
| H3 | 24px | 32px |
| H4 | 20px | 28px |
| Body Large | 17px | 27px |
| Body | 16px | 25px |
| Body Small | 14px | 21px |

These values are starting recommendations, not hard requirements. Preserve existing visual hierarchy where the current design is already strong.

---

# 7. Prefer Responsive CSS

For major headings, prefer fluid scaling where appropriate.

Example:

```css
font-size: clamp(2rem, 4vw, 3.5rem);
line-height: 1.15;
```

Do not create excessive breakpoint-specific typography overrides.

Use breakpoints only where fluid scaling cannot provide a good result.

---

# 8. Font Family Strategy

First identify the font family currently used by the website.

Do not replace the existing font automatically.

If the current font is appropriate:

- Keep it.
- Centralize it.
- Remove duplicate declarations.

If the current font is inconsistent:

- Select one primary font for the public website.
- Define reliable system fallbacks.
- Avoid loading unnecessary font families.

Example architecture:

```css
--font-primary: "Primary Font", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
```

Do not introduce a second heading font unless the design intentionally requires a distinctive editorial style.

---

# 9. Font Weight System

Standardize the public website around a small set of weights:

```text
400 — Regular
500 — Medium
600 — Semibold
700 — Bold
```

Avoid loading unnecessary weights such as:

```text
100
200
300
800
900
```

unless they are genuinely used by the design.

---

# 10. CSS/Tailwind Typography Tokens

If Tailwind is already being used, centralize typography in the Tailwind theme rather than scattering arbitrary values throughout components.

Conceptually:

```js
theme: {
  extend: {
    fontSize: {
      display: [...],
      h1: [...],
      h2: [...],
      h3: [...],
      h4: [...],
      body: [...],
      "body-lg": [...],
      "body-sm": [...],
      caption: [...]
    },
    fontWeight: {
      regular: "400",
      medium: "500",
      semibold: "600",
      bold: "700"
    }
  }
}
```

Use the actual Tailwind configuration already present in the project.

Do not overwrite the existing configuration.

---

# 11. Remove Arbitrary Typography Values

Identify patterns such as:

```text
text-[43px]
text-[37px]
text-[19px]
text-[21px]
font-[650]
leading-[27px]
```

If the value represents an existing typography role, replace it with the appropriate token.

Example:

```text
text-[28px]
```

could become:

```text
H3
```

Do not blindly replace every arbitrary value. Some component-specific values may be intentional.

---

# 12. Heading Hierarchy

Public pages should follow a consistent semantic structure:

```text
H1
 ├── H2
 │    ├── H3
 │    └── H3
 └── H2
      └── H3
```

Rules:

- Normally use one primary H1 for the main page subject.
- Do not use H1 only because it looks visually attractive.
- Do not skip heading levels unnecessarily.
- Do not use heading tags only for styling.
- Use CSS typography tokens to control visual appearance.

---

# 13. Hero Typography

Standardize all hero sections.

Hero should generally contain:

```text
Eyebrow/Label
Display/H1
Supporting Description
Primary CTA
Secondary CTA
```

Example hierarchy:

```text
Eyebrow → 14px / 20px / 600
Hero H1 → Display
Description → Body Large
CTA → Button
```

Ensure the heading has a controlled maximum width.

Avoid extremely long hero lines.

---

# 14. Section Heading System

All major sections should use a consistent pattern:

```text
Eyebrow
Section H2
Description
```

Example:

```text
OUR IMPACT

Making a real difference every day

From animal rescue to community support...
```

Use the same typography tokens across:

- Home
- About
- Campaigns
- Donation
- Volunteer
- Gallery
- Blog
- Contact

---

# 15. Card Typography

Standardize cards.

Recommended:

```text
Card Label      → Caption/Label
Card Title      → H4
Card Description → Body Small
Card Metadata   → Caption
Card CTA        → Button/Body Small
```

Campaign cards, blog cards, animal cards, and impact cards should use the same visual hierarchy unless there is a clear design reason to differ.

---

# 16. Blog Typography

Long-form content needs a dedicated reading system.

Recommended:

```text
Article Title → H1
Article Intro → Body Large
Article Body → Body
Article H2 → H2
Article H3 → H3
Article Metadata → Caption
Image Caption → Caption
Quote → Body Large
```

Recommended reading width:

```css
max-width: 65ch;
```

Use comfortable paragraph spacing.

Avoid overly narrow or excessively wide text blocks.

---

# 17. Campaign & Donation Typography

Donation and campaign pages should create a clear hierarchy.

Recommended roles:

```text
Campaign Title
Campaign Summary
Impact Number
Donation Amount
Progress Information
CTA
Supporting Information
```

Important numbers may use Display/H2 typography.

Do not use extremely large numbers if they negatively affect mobile layouts.

---

# 18. Impact Statistics

For NGO impact statistics:

```text
3000+ animals treated
100+ animals rehomed
1500+ children supported
40,511+ people impacted
```

Use a consistent pattern:

```text
Number
Description
```

Example:

```text
3000+
Animals Treated
```

Numbers:

```text
Display / H2
700 weight
```

Descriptions:

```text
Body Small / Label
500 weight
```

Keep all statistic cards aligned consistently.

---

# 19. Navigation

Standardize:

```text
Desktop Navigation
Mobile Navigation
Dropdown
Footer Navigation
```

Recommended:

```text
15px
500 weight
22px line-height
```

Active navigation should be distinguished through the existing visual design without unnecessarily increasing font weight or size.

---

# 20. Buttons

Standardize button typography.

Recommended:

```text
15px
600 weight
20px line-height
```

Use the same typography for:

- Donate
- Volunteer
- Contact
- Learn More
- Read More
- Submit
- Campaign CTA

Button size may vary by context, but typography should remain consistent.

---

# 21. Forms

Standardize:

```text
Label
Input
Placeholder
Helper text
Error
Success message
```

Suggested roles:

```text
Label → 14px / 20px / 500
Input → 16px / 24px / 400
Helper → 13–14px / 20px / 400
Error → 13–14px / 20px / 500
```

Do not rely only on font color to communicate errors.

---

# 22. Footer

Use:

```text
Footer Heading → H4 / 600
Footer Link → Body Small / 400–500
Contact → Body Small
Copyright → Caption
```

Keep footer typography consistent across all pages.

---

# 23. Mobile Typography

Mobile typography must be reviewed separately.

Check:

- Hero headings
- Section headings
- Cards
- Buttons
- Navigation
- Blog content
- Donation amounts
- Statistics
- Forms

Avoid:

```text
horizontal overflow
text clipping
unnecessary line breaks
huge headings
tiny body text
```

Do not reduce body text below a comfortable reading size just to fit more content.

---

# 24. Font Loading Performance

Audit all fonts.

Prefer:

```text
WOFF2
```

where available.

Use appropriate:

```css
font-display: swap;
```

Avoid loading font weights that are never used.

Check whether third-party font requests delay rendering.

Typography improvements must not introduce a significant LCP regression.

---

# 25. Accessibility

Verify:

- readable font size
- adequate line height
- sufficient text contrast
- visible focus states
- readable links
- readable buttons
- proper heading hierarchy
- text remains usable when browser text size is increased

Typography must support accessibility rather than only visual appearance.

---

# 26. Public Website vs Admin Panel

## Public Website

Use the NGO design system.

Typography should feel:

- warm
- trustworthy
- modern
- approachable
- readable

## Admin Panel

Keep Admin typography aligned with its UI framework.

If Ant Design is being used, do not unnecessarily replace Ant Design's typography system.

Instead, standardize:

- page headings
- table text
- form labels
- buttons
- modal headings
- helper text

---

# 27. Files to Inspect Before Implementation

The developer should inspect:

```text
package.json
tailwind.config.*
vite.config.*
index.html

src/main.*
src/App.*
src/index.css
src/App.css

src/components/**
src/pages/**
src/layouts/**
src/styles/**
src/assets/**

all font imports
all CSS files
all Tailwind classes
```

Use the actual project structure if it differs.

---

# 28. Implementation Order

## Phase 1 — Audit

- Identify current font families.
- Identify font weights.
- Identify font sizes.
- Identify line heights.
- Identify letter spacing.
- Identify arbitrary typography.
- Identify heading hierarchy.

## Phase 2 — Design Tokens

Create:

- Font family tokens
- Font weight tokens
- Font size tokens
- Line-height tokens
- Letter-spacing tokens

## Phase 3 — Global Styles

Update:

- Body
- Headings
- Links
- Buttons
- Forms

without breaking existing component styles.

## Phase 4 — Component Consistency

Update:

- Header
- Hero
- Section headings
- Cards
- Campaigns
- Blog
- Donation
- Statistics
- Footer

## Phase 5 — Responsive

Verify:

- Desktop
- Tablet
- Mobile

## Phase 6 — Accessibility & Performance

Verify:

- contrast
- readability
- font loading
- layout stability
- Core Web Vitals

---

# 29. Testing Checklist

Before considering typography complete:

- [ ] One primary font system
- [ ] Controlled font weights
- [ ] Consistent H1
- [ ] Consistent H2
- [ ] Consistent H3
- [ ] Consistent H4
- [ ] Consistent body text
- [ ] Consistent navigation
- [ ] Consistent buttons
- [ ] Consistent forms
- [ ] Consistent cards
- [ ] Consistent statistics
- [ ] Consistent blog typography
- [ ] Consistent campaign typography
- [ ] Consistent footer typography
- [ ] Responsive typography tested
- [ ] No text overflow
- [ ] No unexpected line wrapping
- [ ] Font loading tested
- [ ] Accessibility checked
- [ ] No unnecessary font weights
- [ ] Arbitrary typography values reviewed

---

# 30. Definition of Done

Typography improvement is complete when:

1. The public website uses a centralized typography system.
2. Font family usage is consistent.
3. Font weights are controlled.
4. Heading hierarchy is consistent.
5. Body text is readable.
6. Buttons use consistent typography.
7. Forms use consistent typography.
8. Blog content has an optimized reading style.
9. Campaign and donation pages have consistent hierarchy.
10. Statistics use a consistent visual pattern.
11. Mobile typography is responsive.
12. Typography does not introduce layout shifts.
13. Unnecessary font files are removed.
14. Accessibility has been reviewed.
15. Arbitrary typography values have been reduced where appropriate.
16. Existing visual identity has been preserved unless a change is intentionally approved.

---

# 31. Important Implementation Rule

Do not redesign the entire website.

The goal is:

```text
Existing Design
      ↓
Typography Audit
      ↓
Consistent Design Tokens
      ↓
Reusable Typography Rules
      ↓
Consistent Website
```

Do not change colors, spacing, layouts, components, images, or branding unless a typography issue directly requires it.

Any significant visual change should be documented and approved before implementation.
