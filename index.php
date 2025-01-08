<?php
session_start();
include 'includes/db.php';
include 'includes/helpers.php';
include 'includes/get_courses.php';
include 'includes/get_course_by_id.php';
$page_title = "Home | Digital Shikkhok";
$courses = get_courses($conn);
ob_start();
?>



<section class="position-relative overflow-hidden pt-5 pt-lg-3">
  <!-- SVG START -->
  <figure
    class="position-absolute top-50 start-0 translate-middle-y ms-n7 d-none d-xxl-block">
    <svg class="rotate-74 fill-danger opacity-1">
      <circle cx="180.4" cy="15.5" r="7.7" />
      <path
        d="m159.9 22.4c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
      <ellipse
        transform="matrix(.3862 -.9224 .9224 .3862 71.25 138.08)"
        cx="139.4"
        cy="15.5"
        rx="6.1"
        ry="6.1" />
      <circle cx="118.9" cy="15.5" r="5.4" />
      <path
        d="m98.4 20.1c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2.1 4.6-4.6 4.6z" />
      <path
        d="m77.9 19.3c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8-1.7 3.8-3.8 3.8z" />
      <path
        d="m57.3 18.6c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1-1.4 3.1-3.1 3.1z" />
      <path
        d="m36.8 17.8c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
      <circle cx="16.3" cy="15.5" r="1.6" />
      <circle cx="180.4" cy="38.5" r="7.7" />
      <path
        d="m159.9 45.3c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
      <ellipse
        transform="matrix(.8486 -.5291 .5291 .8486 .7599 79.566)"
        cx="139.4"
        cy="38.5"
        rx="6.1"
        ry="6.1" />
      <circle cx="118.9" cy="38.5" r="5.4" />
      <path
        d="m98.4 43.1c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2.1 4.6-4.6 4.6z" />
      <circle cx="77.9" cy="38.5" r="3.8" />
      <path
        d="m57.3 41.5c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1c0 1.8-1.4 3.1-3.1 3.1z" />
      <path
        d="m36.8 40.8c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
      <circle cx="16.3" cy="38.5" r="1.6" />
      <circle cx="180.4" cy="61.4" r="7.7" />
      <path
        d="m159.9 68.3c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
      <ellipse
        transform="matrix(.3862 -.9224 .9224 .3862 28.902 166.26)"
        cx="139.4"
        cy="61.4"
        rx="6.1"
        ry="6.1" />
      <circle cx="118.9" cy="61.4" r="5.4" />
      <path
        d="m98.4 66c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6c0 2.6-2.1 4.6-4.6 4.6z" />
      <path
        d="m77.9 65.2c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8-1.7 3.8-3.8 3.8z" />
      <path
        d="m57.3 64.5c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1-1.4 3.1-3.1 3.1z" />
      <path
        d="m36.8 63.7c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
      <circle cx="16.3" cy="61.4" r="1.6" />
      <circle cx="180.4" cy="84.4" r="7.7" />
      <path
        d="m159.9 91.3c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
      <path
        d="m139.4 90.5c-3.4 0-6.1-2.7-6.1-6.1s2.7-6.1 6.1-6.1 6.1 2.7 6.1 6.1c0 3.3-2.7 6.1-6.1 6.1z" />
      <circle cx="118.9" cy="84.4" r="5.4" />
      <path
        d="m98.4 89c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2.1 4.6-4.6 4.6z" />
      <path
        d="m77.9 88.2c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8-1.7 3.8-3.8 3.8z" />
      <path
        d="m57.3 87.4c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1c0 1.8-1.4 3.1-3.1 3.1z" />
      <path
        d="m36.8 86.7c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
      <circle cx="16.3" cy="84.4" r="1.6" />
      <circle cx="180.4" cy="107.3" r="7.7" />
      <path
        d="m159.9 114.2c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
      <path
        d="m139.4 113.4c-3.4 0-6.1-2.7-6.1-6.1s2.7-6.1 6.1-6.1 6.1 2.7 6.1 6.1-2.7 6.1-6.1 6.1z" />
      <circle cx="118.9" cy="107.3" r="5.4" />
      <path
        d="m98.4 111.9c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6c0 2.6-2.1 4.6-4.6 4.6z" />
      <path
        d="m77.9 111.2c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8-1.7 3.8-3.8 3.8z" />
      <path
        d="m57.3 110.4c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1-1.4 3.1-3.1 3.1z" />
      <path
        d="m36.8 109.6c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3c0.1 1.3-1 2.3-2.3 2.3z" />
      <circle cx="16.3" cy="107.3" r="1.6" />
      <circle cx="180.4" cy="130.3" r="7.7" />
      <path
        d="m159.9 137.2c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
      <ellipse
        transform="matrix(.3862 -.9224 .9224 .3862 -34.62 208.52)"
        cx="139.4"
        cy="130.3"
        rx="6.1"
        ry="6.1" />
      <circle cx="118.9" cy="130.3" r="5.4" />
      <path
        d="m98.4 134.9c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2.1 4.6-4.6 4.6z" />
      <path
        d="m77.9 134.1c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8-1.7 3.8-3.8 3.8z" />
      <path
        d="m57.3 133.4c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1-1.4 3.1-3.1 3.1z" />
      <path
        d="m36.8 132.6c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
      <circle cx="16.3" cy="130.3" r="1.6" />
      <circle cx="180.4" cy="153.2" r="7.7" />
      <path
        d="m159.9 160.1c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
      <ellipse
        transform="matrix(.3862 -.9224 .9224 .3862 -55.794 222.61)"
        cx="139.4"
        cy="153.2"
        rx="6.1"
        ry="6.1" />
      <circle cx="118.9" cy="153.2" r="5.4" />
      <path
        d="m98.4 157.8c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6c0 2.6-2.1 4.6-4.6 4.6z" />
      <circle cx="77.9" cy="153.2" r="3.8" />
      <path
        d="m57.3 156.3c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1-1.4 3.1-3.1 3.1z" />
      <path
        d="m36.8 155.5c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
      <circle cx="16.3" cy="153.2" r="1.6" />
      <circle cx="180.4" cy="176.2" r="7.7" />
      <path
        d="m159.9 183.1c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
      <ellipse
        transform="matrix(.3862 -.9224 .9224 .3862 -76.968 236.7)"
        cx="139.4"
        cy="176.2"
        rx="6.1"
        ry="6.1" />
      <circle cx="118.9" cy="176.2" r="5.4" />
      <path
        d="m98.4 180.8c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2.1 4.6-4.6 4.6z" />
      <path
        d="m77.9 180c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8-1.7 3.8-3.8 3.8z" />
      <path
        d="m57.3 179.3c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1-1.4 3.1-3.1 3.1z" />
      <path
        d="m36.8 178.5c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
      <circle cx="16.3" cy="176.2" r="1.6" />
    </svg>
  </figure>
  <!-- SVG END -->

  <!-- SVG START -->
  <span
    class="position-absolute top-50 end-0 translate-middle-y mt-5 me-n5 d-none d-xxl-inline-flex">
    <svg class="fill-warning rotate-186 opacity-8">
      <path
        d="m35.4 54.2c0 0.6 0 1.1-0.1 1.7-0.9 9.3-9.2 16.1-18.5 15.1-4.5-0.4-8.5-2.6-11.4-6.1-2.8-3.5-4.2-7.9-3.7-12.4 0.9-9.3 9.2-16.1 18.5-15.1 4.5 0.4 8.5 2.6 11.4 6.1 2.4 3 3.8 6.8 3.8 10.7zm-33.4 0c0 3.8 1.3 7.5 3.8 10.4 2.8 3.4 6.8 5.5 11.2 6 9.1 0.9 17.2-5.8 18.1-14.8 0.4-4.4-0.9-8.7-3.7-12.1s-6.8-5.5-11.2-6c-9.2-0.8-17.3 5.8-18.2 14.9v1.6z" />
      <path
        d="m39 54.1c0 1.1-0.1 2.2-0.3 3.3-1.8 9.8-11.2 16.2-21 14.4-4.7-0.8-8.8-3.5-11.5-7.4-2.7-4-3.7-8.7-2.8-13.5 1.8-9.8 11.2-16.2 21-14.4 4.7 0.9 8.8 3.6 11.5 7.5 2.1 3 3.1 6.6 3.1 10.1zm-35.6 0.1c0 3.5 1.1 7 3.1 9.9 2.7 3.9 6.7 6.5 11.3 7.4 9.6 1.8 18.8-4.5 20.6-14.1 0.9-4.6-0.1-9.3-2.8-13.2s-6.7-6.5-11.3-7.4c-9.6-1.8-18.8 4.5-20.6 14.1-0.2 1.1-0.3 2.2-0.3 3.3z" />
      <path
        d="m42.8 54.2c0 1.7-0.2 3.3-0.7 5-2.7 10.2-13.3 16.3-23.5 13.6-5-1.3-9.1-4.5-11.7-8.9-2.5-4.5-3.2-9.7-1.9-14.7 2.7-10.2 13.3-16.3 23.5-13.6 5 1.3 9.1 4.5 11.7 8.9 1.7 3 2.6 6.3 2.6 9.7zm-38.1 0c0 3.3 0.9 6.5 2.5 9.4 2.5 4.4 6.6 7.5 11.5 8.8 10 2.7 20.4-3.3 23.1-13.4 1.3-4.9 0.6-9.9-1.9-14.3s-6.6-7.5-11.5-8.8c-10-2.6-20.4 3.4-23 13.4-0.5 1.6-0.7 3.3-0.7 4.9z" />
      <path
        d="m46.7 54.2c0 2.2-0.4 4.5-1.1 6.6-3.6 10.7-15.3 16.5-26.1 12.8-5.2-1.8-9.4-5.4-11.8-10.4-2.4-4.9-2.8-10.5-1-15.7 3.6-10.6 15.3-16.4 26-12.8l-0.1 0.2 0.1-0.2c5.2 1.8 9.4 5.4 11.8 10.4 1.5 2.9 2.2 6 2.2 9.1zm-40.8 0c0 3.1 0.7 6.1 2.1 8.9 2.4 4.8 6.5 8.4 11.6 10.2 10.5 3.6 22-2.1 25.6-12.6 1.7-5.1 1.4-10.6-1-15.4s-6.5-8.4-11.6-10.2c-10.5-3.6-22 2.1-25.6 12.6-0.7 2.1-1.1 4.3-1.1 6.5z" />
      <path
        d="m50.7 54.2c0 2.8-0.5 5.6-1.6 8.2-4.5 11.2-17.4 16.6-28.6 12.1-5.4-2.2-9.7-6.4-12-11.8s-2.3-11.4-0.1-16.8c4.5-11.2 17.4-16.6 28.6-12.1 5.4 2.2 9.7 6.4 12 11.8 1.1 2.8 1.7 5.7 1.7 8.6zm-43.6 0c0 2.8 0.6 5.7 1.7 8.4 2.2 5.3 6.4 9.4 11.8 11.6 11 4.5 23.6-0.9 28.1-11.9 2.2-5.3 2.1-11.2-0.1-16.5s-6.4-9.4-11.8-11.6c-11-4.5-23.6 0.9-28.1 11.9-1.1 2.6-1.6 5.3-1.6 8.1z" />
      <path
        d="m54.7 54.2c0 3.4-0.7 6.7-2.2 9.9-5.5 11.7-19.5 16.7-31.2 11.3-5.7-2.6-10-7.3-12.1-13.2s-1.8-12.2 0.8-17.9c5.5-11.7 19.4-16.8 31.1-11.3 5.7 2.6 10 7.3 12.1 13.2 1 2.6 1.5 5.3 1.5 8zm-46.5 0c0 2.7 0.5 5.3 1.4 7.9 2.1 5.8 6.3 10.4 11.9 13 11.5 5.4 25.3 0.4 30.6-11.1 2.6-5.6 2.9-11.8 0.8-17.6s-6.3-10.4-11.9-13l0.1-0.2-0.1 0.1c-11.5-5.4-25.3-0.4-30.6 11.1-1.5 3.1-2.2 6.5-2.2 9.8z" />
      <path
        d="m58.7 54.2c0 4-1 7.9-2.8 11.5-6.4 12.2-21.5 16.9-33.6 10.6-6-3.1-10.3-8.3-12.3-14.6s-1.4-13.1 1.7-19c6.3-12.2 21.4-17 33.6-10.6 5.9 3.1 10.3 8.3 12.3 14.6 0.8 2.5 1.1 5 1.1 7.5zm-49.5 0c0 2.5 0.4 5 1.1 7.4 2 6.3 6.3 11.4 12.1 14.4 12 6.3 26.9 1.6 33.1-10.4 3-5.8 3.6-12.5 1.7-18.7-2-6.3-6.3-11.4-12.1-14.4-12-6.3-26.9-1.6-33.1 10.4-1.9 3.5-2.8 7.4-2.8 11.3z" />
      <path
        d="m62.9 54.2c0 4.6-1.2 9.1-3.5 13.1-7.3 12.7-23.6 17.1-36.2 9.9-6.1-3.5-10.5-9.2-12.4-16s-0.9-14 2.6-20.1c7.3-12.7 23.5-17.1 36.2-9.8l-0.1 0.2 0.1-0.2c6.1 3.5 10.5 9.2 12.4 16 0.5 2.3 0.9 4.6 0.9 6.9zm-52.7-0.1c0 2.3 0.3 4.6 0.9 6.9 1.8 6.7 6.2 12.3 12.2 15.8 12.5 7.2 28.5 2.9 35.7-9.6 3.5-6.1 4.4-13.1 2.5-19.8-1.8-6.7-6.2-12.3-12.2-15.8-12.5-7.2-28.5-2.8-35.7 9.7-2.2 3.9-3.4 8.3-3.4 12.8z" />
      <path
        d="m67 54.2c0 5.2-1.4 10.3-4.2 14.8-8.2 13.2-25.5 17.2-38.7 9-6.4-4-10.8-10.2-12.5-17.5s-0.5-14.8 3.5-21.2c8.2-13.2 25.5-17.2 38.7-9 6.4 4 10.8 10.2 12.5 17.5 0.5 2.1 0.7 4.3 0.7 6.4zm-55.9-0.1c0 2.1 0.2 4.3 0.7 6.4 1.7 7.2 6.1 13.3 12.4 17.2 13 8.1 30.1 4.1 38.2-8.9 3.9-6.3 5.1-13.7 3.4-20.9s-6.1-13.3-12.4-17.2c-13-8.1-30.1-4.1-38.2 8.9-2.6 4.4-4.1 9.4-4.1 14.5z" />
      <path
        d="m71.2 54.2c0 5.8-1.7 11.5-5 16.4-9.1 13.7-27.6 17.4-41.2 8.3-6.6-4.4-11.1-11.1-12.7-18.9s0-15.7 4.4-22.3c9.1-13.6 27.6-17.4 41.2-8.3 6.6 4.4 11.1 11.1 12.7 18.9 0.4 2 0.6 4 0.6 5.9zm-59.1-0.1c0 1.9 0.2 3.9 0.6 5.9 1.5 7.7 6 14.3 12.5 18.6 13.5 9 31.7 5.3 40.7-8.2 4.3-6.5 5.9-14.4 4.3-22-1.5-7.7-6-14.3-12.5-18.6-13.5-9-31.7-5.3-40.7 8.2-3.3 4.8-4.9 10.4-4.9 16.1z" />
      <path
        d="m75.4 54.3c0 6.4-2 12.7-5.8 18-10 14.1-29.6 17.5-43.7 7.5-6.9-4.8-11.4-12-12.8-20.3s0.5-16.6 5.3-23.4c9.9-14.1 29.6-17.5 43.7-7.5 6.8 4.8 11.4 12 12.8 20.3 0.3 1.8 0.5 3.6 0.5 5.4zm-62.4-0.2c0 1.8 0.2 3.6 0.5 5.3 1.4 8.2 5.9 15.3 12.7 20.1 14 9.9 33.4 6.5 43.2-7.4 4.8-6.8 6.6-15 5.2-23.1-1.4-8.2-5.9-15.3-12.7-20.1-14-9.9-33.4-6.5-43.2 7.4-3.8 5.3-5.7 11.5-5.7 17.8z" />
      <path
        d="m79.6 54.3c0 7.1-2.3 13.9-6.5 19.7-10.9 14.6-31.6 17.7-46.3 6.8-7.1-5.3-11.7-13-13-21.7s0.9-17.4 6.2-24.5c10.9-14.6 31.6-17.7 46.3-6.8 7.1 5.3 11.7 13 13 21.7 0.2 1.5 0.3 3.1 0.3 4.8zm-65.8-0.2c0 1.6 0.1 3.2 0.4 4.8 1.3 8.7 5.8 16.3 12.8 21.5 14.5 10.8 35 7.7 45.7-6.7 5.2-7 7.4-15.6 6.1-24.2s-5.8-16.3-12.8-21.5l0.1-0.1v0.1c-14.5-10.8-35-7.7-45.7 6.7-4.3 5.7-6.6 12.4-6.6 19.4z" />
      <path
        d="m83.9 54.3c0 7.7-2.5 15.1-7.4 21.3-11.8 15.1-33.7 17.8-48.8 6-7.3-5.7-12-13.9-13.1-23.1s1.4-18.3 7.1-25.6c11.8-15.1 33.7-17.8 48.8-6 7.3 5.7 12 13.9 13.1 23.1 0.2 1.4 0.3 2.8 0.3 4.3zm-69.2-0.2c0 1.4 0.1 2.9 0.3 4.3 1.1 9.1 5.7 17.2 13 22.9 15 11.7 36.6 9 48.3-6 5.7-7.2 8.1-16.2 7-25.4-1.1-9.1-5.7-17.2-13-22.9-15-11.7-36.6-9-48.3 6-4.8 6.1-7.3 13.5-7.3 21.1z" />
      <path
        d="m88.1 54.3c0 8.3-2.8 16.4-8.2 22.9-12.7 15.6-35.7 18-51.3 5.3-7.6-6.1-12.3-14.9-13.3-24.5-1-9.7 1.8-19.2 8-26.7 12.7-15.6 35.7-18 51.3-5.3 7.6 6.1 12.3 14.9 13.3 24.5 0.2 1.2 0.2 2.5 0.2 3.8zm-72.6-0.2c0 1.2 0.1 2.5 0.2 3.8 1 9.6 5.6 18.2 13.1 24.3 15.5 12.5 38.3 10.2 50.9-5.2 6.1-7.5 8.9-16.9 7.9-26.5s-5.6-18.2-13.1-24.3c-15.5-12.6-38.3-10.2-50.9 5.2-5.2 6.5-8.1 14.5-8.1 22.7z" />
      <path
        d="m92.4 54.2c0 9-3.1 17.6-9 24.6-13.6 16.1-37.7 18.1-53.8 4.5-7.8-6.6-12.6-15.8-13.4-26-0.9-10.2 2.3-20 8.9-27.8 13.5-16 37.7-18.1 53.8-4.5 7.8 6.6 12.6 15.8 13.4 26 0.1 1.1 0.1 2.2 0.1 3.2zm-76-0.1c0 1.1 0 2.1 0.1 3.2 0.8 10.1 5.6 19.2 13.3 25.7 15.9 13.5 39.8 11.4 53.3-4.5 6.5-7.7 9.7-17.5 8.8-27.6-0.8-9.9-5.6-19.1-13.3-25.6-15.9-13.5-39.8-11.4-53.3 4.5-5.8 6.9-8.9 15.4-8.9 24.3z" />
      <path
        d="m96.7 54.2c0 9.7-3.5 18.9-9.9 26.2-14.5 16.6-39.8 18.3-56.3 3.8-8-7-12.8-16.7-13.6-27.4-0.7-10.6 2.8-20.9 9.8-28.9 14.5-16.6 39.8-18.2 56.3-3.8l-0.1 0.1 0.1-0.1c8 7 12.8 16.7 13.6 27.4 0.1 0.9 0.1 1.8 0.1 2.7zm-79.5-0.1c0 0.9 0 1.8 0.1 2.7 0.7 10.6 5.4 20.2 13.4 27.1 16.4 14.4 41.5 12.7 55.8-3.7 7-7.9 10.4-18.1 9.7-28.7-0.7-10.5-5.4-20.1-13.4-27.1-16.4-14.3-41.5-12.7-55.8 3.8-6.4 7.2-9.8 16.4-9.8 25.9z" />
      <path
        d="m101 54.2c0 10.3-3.8 20.1-10.7 27.9-15.4 17.1-41.8 18.4-58.9 3-8.3-7.5-13.1-17.7-13.7-28.8s3.2-21.8 10.7-30c15.4-17.1 41.8-18.4 58.9-3 8.3 7.5 13.1 17.7 13.7 28.8v2.1zm-83-0.1c0 0.7 0 1.4 0.1 2.2 0.6 11 5.4 21.1 13.6 28.5 16.9 15.3 43.1 13.9 58.4-3 7.4-8.2 11.2-18.8 10.6-29.8s-5.4-21.1-13.6-28.5c-16.9-15.3-43.1-13.9-58.4 3-7 7.7-10.7 17.4-10.7 27.6z" />
      <path
        d="m105.3 54.2c0 11-4.1 21.4-11.6 29.5-16.3 17.5-43.9 18.6-61.4 2.3-8.5-7.9-13.4-18.6-13.8-30.2-0.5-11.6 3.6-22.7 11.5-31.2 16.3-17.5 43.9-18.5 61.4-2.2 8.5 7.9 13.4 18.6 13.8 30.2 0.1 0.5 0.1 1.1 0.1 1.6zm-86.5-0.1v1.6c0.4 11.5 5.3 22.1 13.7 30 17.4 16.2 44.7 15.2 60.9-2.2 7.8-8.4 11.9-19.4 11.5-30.9s-5.3-22.1-13.7-30l0.1-0.1-0.1 0.1c-17.4-16.1-44.7-15.1-60.9 2.3-7.5 8-11.5 18.3-11.5 29.2z" />
      <path
        d="m109.6 54.2c0 11.7-4.4 22.7-12.5 31.2-17.2 18-45.9 18.7-63.9 1.5-8.7-8.3-13.7-19.6-14-31.6-0.3-12.1 4.2-23.6 12.5-32.3 17.2-18 45.9-18.7 63.9-1.5 8.7 8.3 13.7 19.6 14 31.6v1.1zm-90 0v1.1c0.3 12 5.2 23.1 13.9 31.4 17.9 17.1 46.3 16.4 63.4-1.5 8.3-8.7 12.7-20 12.4-32s-5.3-23.2-13.9-31.4c-17.9-17.1-46.4-16.4-63.4 1.5-8.1 8.4-12.4 19.3-12.4 30.9z" />
      <path
        d="m113.9 54.2c0 12.3-4.7 24-13.4 32.8-18.1 18.5-47.9 18.9-66.4 0.8-9-8.8-14-20.5-14.1-33-0.2-12.5 4.6-24.4 13.4-33.4 18.1-18.6 47.9-18.9 66.4-0.8l-0.1 0.1 0.1-0.1c9 8.8 14 20.5 14.1 33v0.6zm-93.6 0v0.5c0.1 12.4 5.1 24.1 14 32.8 18.4 18 48 17.6 65.9-0.7 8.7-8.9 13.4-20.7 13.3-33.1s-5.1-24.1-14-32.8c-18.4-18-48-17.6-65.9 0.7-8.6 8.8-13.3 20.3-13.3 32.6z" />
      <path
        d="m118.3 54.2c0 13-5.1 25.3-14.3 34.5-19 19-50 19-69 0-9.2-9.2-14.3-21.4-14.3-34.5 0-13 5.1-25.3 14.3-34.5 19-19 50-19 69 0l-0.1 0.1 0.1-0.1c9.2 9.2 14.3 21.5 14.3 34.5zm-97.2 0c0 12.9 5 25.1 14.2 34.2 18.9 18.9 49.6 18.9 68.4 0 9.1-9.1 14.2-21.3 14.2-34.2s-5-25.1-14.2-34.2c-18.8-18.9-49.5-18.9-68.4 0-9.2 9.1-14.2 21.3-14.2 34.2z" />
    </svg>
  </span>
  <!-- SVG END -->

  <!-- SVG START -->
  <figure class="position-absolute top-0 start-0 ms-5">
    <svg class="fill-orange opacity-4" width="29px" height="29px">
      <path
        d="M29.004,14.502 C29.004,22.512 22.511,29.004 14.502,29.004 C6.492,29.004 -0.001,22.512 -0.001,14.502 C-0.001,6.492 6.492,-0.001 14.502,-0.001 C22.511,-0.001 29.004,6.492 29.004,14.502 Z"></path>
    </svg>
  </figure>
  <!-- SVG END -->

  <!-- Content START -->
  <div class="container">
    <!-- Title -->
    <div class="row align-items-center g-5">
      <!-- Left content START -->
      <div
        class="col-lg-5 col-xl-6 position-relative z-index-1 text-center text-lg-start mb-7 mb-sm-0">
        <!-- SVG -->
        <figure
          class="fill-warning position-absolute bottom-0 end-0 me-5 d-none d-xl-block">
          <svg width="42px" height="42px">
            <path
              d="M21.000,-0.001 L28.424,13.575 L41.999,20.999 L28.424,28.424 L21.000,41.998 L13.575,28.424 L-0.000,20.999 L13.575,13.575 L21.000,-0.001 Z" />
          </svg>
        </figure>
        <!-- SVG -->
        <figure
          class="fill-success position-absolute top-0 start-50 translate-middle-x mt-n5 ms-5">
          <svg width="22px" height="21px">
            <path
              d="M10.717,4.757 L14.440,-0.001 L14.215,6.023 L20.142,4.757 L16.076,9.228 L21.435,12.046 L15.430,12.873 L17.713,18.457 L12.579,15.252 L10.717,20.988 L8.856,15.252 L3.722,18.457 L6.005,12.873 L-0.000,12.046 L5.359,9.228 L1.292,4.757 L7.220,6.023 L6.995,-0.001 L10.717,4.757 Z" />
          </svg>
        </figure>
        <!-- Title -->
        <h1 class="mb-0 lh-base" style="font-family: 'Hind Siliguri', serif; ">
          আপনার
          <span class="position-relative"> হাতের মুঠোয়
            <span
              class="position-absolute top-50 start-50 translate-middle ms-3 z-index-n1">
              <svg
                width="300px"
                height="62.1px"
                enable-background="new 0 0 366 62.1"
                viewBox="0 0 366 62.1"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  class="fill-warning"
                  d="m322.5 25.3c0 1.4 2.9 0.8 3.1 1.6 0.8 1.1-1.1 1.3-0.6 2.4 13.3 0.9 26.9 1.7 40.2 4-2.5 0.7-4.9 1.6-7.3 1.1-4-0.9-8.2-1-12.2-1.2-8.5-0.5-16.9-1.9-25.5-1.7h-3.1c2.6 0.6 4.8 0.4 5.7 2.2-7.3 0.4-14.1-0.8-21.2-1.1-0.2 0.6-0.5 1.2-0.8 1.8 21.3 0.7 42.5 1.6 64.3 4.6-4.2 1.6-7.7 1-10.8 0.8-6.8-0.5-13.5-1.3-20.3-1.9-0.9-0.1-2.3-0.1-2.9 0.2-2.2 1.6-4.3 0.6-7 0.4 1.4-1 2.5 0.5 3.9-0.8-5.6-1-10.7 0.6-15.9 0s-10.5-0.6-16.6-0.8c2 1.6 4.6 1.3 6.2 1.4 4.9 0 9.9 0.8 14.8 0.7 5.3-0.1 10.4 0.5 15.5 0.9 3.2 0.3 6.7-0.1 9.9-0.4 1.1-0.1 0.5 0.3 0.6 0.6 0.5 0.9 2.2 0.8 3.6 0.8 5.1-0.1 10.1 0.6 14.8 1.5 0.8 0.1 1.5 0 1.7 0.7 0 0.7-0.8 0.6-1.5 0.8-3.9 1.2-7.4-0.2-11.1-0.2-2 0-4.3-1.5-6 0.5-0.3 0.4-1.4 0.1-2.2-0.1-4.5-0.8-9.1-0.5-13.8-1.5-2.3-0.5-5.6 0.1-8.4 0.5-4 0.5-8-0.7-12.1-0.9-3.4-0.2-7.1-0.5-10.5-0.7-7.1-0.3-14.2-1.2-22.3-0.4 4.9 1.1 9.4 1.2 13.8 1.2 9.7 0 19.2 2.3 28.9 1.6 7.3 3.2 15.9 1.5 23.8 2.9 4.9 0.8 10.1 0.8 15.2 1.2 0.5 0 0.8 0.3 1.1 0.9-20-2.1-40.2-1.4-60.8-3 4.9 2.1 10.8-0.3 15.3 2.7-8 1.9-15.8-0.9-23.5-0.1 2.8 1.4 7.1 1.1 9.3 3.3 0.5 0.5 0.2 1.1-1.2 1.3 2.3 1 3.4-2.1 5.7-0.4 0.2-0.6 0.2-1 0.3-1.5 0.8-0.3 2 0.8 1.5 1.5-0.2 0.1 0 0.3 0 0.5 18.7 0.4 37.3 1.7 56.2 3.6-1.7 1.1-2.8 1.2-4.2 1.1-7.1-0.5-14.1-0.9-21.2-1.4-3.1-0.2-6.3-0.4-9.4-0.4-7.6-0.2-15-0.7-22.4-1-9-0.4-17.9-0.1-26.9-0.1-1.2 0-2.9-0.4-3.9 1 14.8 0.3 29.7 0.6 44.4 1.1 14.8 0.6 29.9 1.3 44.2 4.2-4.3 1-8.8 0.9-13 0.5-5.3-0.5-10.5-1.1-15.8-1.2-11.4-0.3-22.9-0.9-34.3-1.2-17.6-0.4-35.4-0.3-53.1-0.4-10.8-0.1-21.7-0.2-32.5 0-17.8 0.4-35.7 0.2-53.5 0.5-13.1 0.3-26.3 0.1-39.4 0.5-11.1 0.3-22.4 0.6-33.6 1-13.1 0.6-26.1 0.2-39.3 0.4-3.9 0.1-7.6 0.2-11.8-0.2 0.9-1.2 2.3-1.3 3.9-1.3 8.4 0.2 16.6-0.4 24.9-0.9 3.9-0.2 7.9-0.4 11.9 0.2 2.5 0.4 5.3-0.3 8-0.4 7.3-0.4 14.7-0.7 22-0.9 11.9-0.5 23.7-1.2 35.6-0.8 7.7 0.2 15.3-0.6 22.9-0.1 2.3 0.2 4.3-0.5 6.5-1h-17.6c-9.6 0-19-0.1-28.6 0-8 0.1-16.1 0.3-24 0.8-2.6 0.2-5.4 0.1-8.2 0.1-10.1 0.3-20.1 0.6-30.2 0.5-5.4 0-10.7-0.1-15.9 0.6-2.3 0.3-4-1.3-6.5-0.6 0.2 0.4 0.5 0.9 0.6 1.5-1.9 0-4 0.4-4.9-0.1-4.2-2.2-9.4-1.5-14.1-2.3-1.7-0.3-3.7-0.1-4.3-1.5-0.5-1.3 1.9-1.5 2.6-2.6-4.2-1.4-4.6-5-8.5-7.2-1.5 0.2-0.9 2.8-4.2 1.3 0.3 2.4 4.5 3.9 2.8 6.4-2.3 0.3-3.2-0.8-4.2-1.7-2.5-4-5.1-8.4-5.1-12.7 0.2-6.8 0.2-13.8 3.6-20.4 0.3-0.5 0.3-1 0.8-1.4 0.9-0.9 1.2-2.4 3.6-2.1 2.2 0.2 2.5 1.5 2.6 2.6 0.2 1.4 1.5 1.8 3.2 2.5 0.9-1.4 0.5-2.9 2.6-3.7 0.2-0.1 0.3-0.4 0.3-0.4-3.1-2.2 1.2-2.2 2.3-3.3-3.1-1.8-4-4.3-3.7-7-1.5-0.3-3.1-0.4-4.5 0-1.7 0.6-2.2-0.5-2.9-1 0.6-0.5 0.8-1.1 2.2-1.3 7.6-0.9 15.2-1.7 22.9-2 20-0.7 39.9-0.9 59.9-1 11.9-0.1 23.8 0.4 35.6 1.1 3.6 0.2 7.1-0.9 10.7-0.5 7.9 0.9 15.8 0.3 23.8 0.5 7.3 0.1 14.4-0.6 21.7-0.1 12.2 0.9 24.4 0.3 36.7 0.6 9.4 0.3 18.9 0.4 28.2 1 11.9 0.7 23.8 1.3 35.6 2 11.1 0.6 22.4 0.5 33.3 2 7.1 1 14.4 1.1 21.3 2.4 4 0.7 8.2 1.6 12.4 1.9 2.2 0.2 0.9 1 1.5 1.5-4-0.8-8-0.8-12.1-1.4-4.3-0.7-8.5-1-12.8 0.4-2.9 1-6.3 0.2-9.3-0.1-10.2-1.1-20.6-1.6-30.8-2.4-12.1-0.9-24.3-1.4-36.4-2.1-9.9-0.6-20-0.5-29.9-1-11.4-0.6-22.7 0-34.2-0.5-6.3-0.3-12.3-0.3-18.5-0.4-4.2-0.1-8.4 1.3-12.8 0.3 0.6 0.2 1.2 0.7 1.9 0.7 10.5 0 20.9 1.9 31.6 1.7 6.5-0.1 13.1 0.2 19.8 0.8 3.2 0.3 6.3-0.4 9.7-0.1 7.6 0.7 15.5 0.5 23 0.8 12.4 0.5 24.7 0.4 37.1 1.1 13.3 0.7 26.8 2.1 39.9 4.1 6.2 0.9 12.7 1.5 19.2 1.7 0.6 0 1.1 0.1 1.5 0.5-4.6 0.1-9.3 0-13.9-0.5-0.6 1.1 1.4 0.9 1.5 1.9-9.7 1.6-19.6-1.4-29.4-0.1 2.2 1.4 5.1 1 7.4 1 7.3 0.1 14.1 1.3 21.2 1.9 2.8 0.3 5.9 0 8.5 0.8 1.5 0.5 4.6-1.1 4.9 1.3 4-0.7 7.3 1.5 11.1 1.2 4-0.3 7.7 0.6 11.6 1.1 0.8 0.1 2.2 0.3 2.3 1.1 0.2 1-1.1 1.2-2 1.5-3.4 1-6.7-0.4-10.1-0.4-0.9 0-2-0.2-2.9-0.2-9.4 0.1-18.8-1.3-28.3-1.8-6-0.4-12.1-0.9-18.1-1.3 0 0.2 0 0.4-0.2 0.6 6.1 0.5 12.1 1.4 18.3 0.7z" />
              </svg>
            </span>
          </span>
          <br>অসীম শিক্ষার জগৎ।
        </h1>


        <!-- Content -->
        <p class="mb-3 mt-2 lead">
          ডিজিটাল এই যুগে নিজেকে দক্ষ হিসেবে গড়ে তুলুন আমারদের ১০টির ও বেশি অনলাইন কোর্সের মাধ্যমে।
        </p>

        <!-- Info -->
        <ul
          class="list-inline position-relative justify-content-center justify-content-lg-start mb-4">
          <li class="list-inline-item me-2">
            <i class="bi bi-patch-check-fill h6 me-1"></i>বিশেষজ্ঞদের সাথে শিখুন
          </li>
          <li class="list-inline-item me-2">
            <i class="bi bi-patch-check-fill h6 me-1"></i>সার্টিফিকেট অর্জন করুন
          </li>
        </ul>

        <div class="d-sm-flex align-items-center justify-content-center justify-content-lg-start">
          <!-- Button -->
          <a href="our_courses.php" class="btn btn-lg btn-danger-soft me-2 mb-4 mb-sm-0">শুরু করুন</a>
          <!-- Video button -->
          <div
            class="d-flex align-items-center justify-content-center py-2 ms-0 ms-sm-4">
            <a
              data-glightbox
              data-gallery="office-tour"
              href="https://www.youtube.com/embed/IeUZmBVPmDg?si=8KyeVbFAuuJ0mlZs"
              class="btn btn-round btn-primary-shadow mb-0 overflow-visible me-7">
              <i class="fas fa-play"></i>
              <h6 class="mb-0 ms-3 fw-normal position-absolute start-100 top-50 translate-middle-y font-weight-bold">
                ভিডিও দেখুন
              </h6>
            </a>
          </div>
        </div>
      </div>
      <!-- Left content END -->

      <!-- Right content START -->
      <div class="col-lg-7 col-xl-6 text-center position-relative pt-2">
        <!-- SVG decoration -->
        <figure
          class="position-absolute bottom-0 start-50 translate-middle-x mt-4 mb-0">
          <svg
            class="pt-5 pt-sm-0"
            width="550px"
            height="538px"
            viewBox="0 0 554 544"
            style="enable-background: new 0 0 554 544"
            xml:space="preserve">
            <path
              class="fill-blue"
              d="M423.3,77.2c49.5,32.5,100.4,67.2,118.4,114.5s3.5,107.1-15.4,165.7c-18.7,58.6-41.8,116.1-84,148.6 c-42.5,32.8-104.2,40.2-163.8,37.3c-59.5-3.2-116.8-17.1-164.7-47.9c-48.3-30.6-87.2-78.2-102-131.6C-3,310.5,6.6,251,25.3,194.7 C43.6,138,70.7,84.3,114.1,49.5C157.2,14.8,216.7-1,270.8,6.4C324.8,14.2,373.4,44.7,423.3,77.2z" />
          </svg>
        </figure>

        <!-- SVG decoration -->
        <figure
          class="position-absolute bottom-0 start-50 translate-middle-x mb-n5 z-index-9">
          <svg width="686px" height="298px" viewBox="0 0 686 298">
            <path
              class="fill-body"
              d="M60.9,0L0.1,0C0,0,0,0,0,0.1c1.5,5,0,249.5,11.5,297.9c0,0,649.1,16.1,669-4.6c0,0,0,0,0,0c0.2-0.4,1.2-177.2,4.2-293.3 c0,0,0-0.1-0.1-0.1l-72.9,0c0,0-0.1,0-0.1,0c-0.8,3-43.3,162.3-105.9,209.1c0,0-111.4,87.2-309.9-6C195.9,203.1,66.1,143.2,60.9,0 C61,0,60.9,0,60.9,0z" />
          </svg>
        </figure>


        <div
          class="p-2 bg-white shadow rounded-3 position-absolute top-50 start-0 translate-middle-y mt-n7 d-none d-sm-block">
          <img src="assets/images/client/science.svg" alt="Icon" />
        </div>
        <div style="top: 15%;"
          class="p-2 bg-white shadow rounded-3 position-absolute end-0 me-5">
          <img class="h-50px" src="assets/images/client/graduated.svg" alt="Icon" />
        </div>
        <!-- Icon logos END -->

        <!-- Congratulations message -->
        <div
          class="p-3 bg-blur border border-light shadow rounded-4 position-absolute bottom-0 start-0 z-index-9 d-none d-xl-block mb-5 ms-5">
          <div class="d-flex justify-content-between align-items-center">
            <!-- Icon -->
            <span class="icon-lg bg-warning rounded-circle"><i class="fas fa-envelope text-white"></i></span>
            <!-- Info -->
            <div class="text-start ms-3">
              <h6 class="mb-0 text-white">
                অভিনন্দন
                <span class="ms-5"><i class="fas fa-check-circle text-success"></i></span>
              </h6>
              <p class="mb-0 small text-white">
                আপনার ভর্তি সম্পন্ন হয়েছে
              </p>
            </div>
          </div>
        </div>

        <!-- Active student -->
        <div
          class="p-3 bg-success d-inline-block rounded-4 shadow-lg position-absolute end-0 translate-middle-y mt-n7 d-none d-md-block"
          style="
                  background: url(assets/images/pattern/01.png) no-repeat center
                    center;
                  background-size: cover;
                  top: 75%;
                  z-index: 20;
                ">
          <p class="text-white">আমাদের নতুন শিক্ষার্থীরা</p>
          <!-- Avatar group -->
          <ul class="avatar-group mb-0">
            <li class="avatar avatar-sm">
              <img
                class="avatar-img rounded-circle border-white"
                src="./uploads/img/users/user-01.jpg"
                alt="avatar" />
            </li>
            <li class="avatar avatar-sm">
              <img
                class="avatar-img rounded-circle border-white"
                src="./uploads/img/users/user-02.jpg"
                alt="avatar" />
            </li>
            <li class="avatar avatar-sm">
              <img
                class="avatar-img rounded-circle border-white"
                src="./uploads/img/users/user-03.jpg"
                alt="avatar" />
            </li>
            <li class="avatar avatar-sm">
              <img
                class="avatar-img rounded-circle border-white"
                src="./uploads/img/users/user-04.jpg"
                alt="avatar" />
            </li>
            <li class="avatar avatar-sm">
              <div
                class="avatar-img rounded-circle border-white bg-primary">
                <span
                  class="text-white position-absolute top-50 start-50 translate-middle small">1K+</span>
              </div>
            </li>
          </ul>
        </div>
        <!-- Image -->
        <div class="position-relative ms-sm-4">
          <img src="assets/images/element/enginners-1.png" alt="" />
        </div>
      </div>
      <!-- Right content END -->
    </div>
  </div>
  <!-- Content END -->
</section>
<!-- =======================
Main Banner END -->

<!-- =======================
Counter START -->
<section class="py-0 py-xl-5">
  <div class="container">
    <div class="row g-4">
      <!-- Counter item -->
      <div class="col-sm-6 col-xl-3">
        <div
          class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-15 rounded-3">
          <span class="display-6 lh-1 text-warning mb-0"><i class="fas fa-tv"></i></span>
          <div class="ms-4 h6 fw-normal mb-0">
            <div class="d-flex">
              <h5
                class="purecounter mb-0 fw-bold"
                data-purecounter-start="0"
                data-purecounter-end="10"
                data-purecounter-delay="200">
                0
              </h5>
              <span class="mb-0 h5">+</span>
            </div>
            <p class="mb-0">অনলাইন কোর্স</p>
          </div>
        </div>
      </div>
      <!-- Counter item -->
      <div class="col-sm-6 col-xl-3">
        <div
          class="d-flex justify-content-center align-items-center p-4 bg-blue bg-opacity-10 rounded-3">
          <span class="display-6 lh-1 text-blue mb-0"><i class="fas fa-user-tie"></i></span>
          <div class="ms-4 h6 fw-normal mb-0">
            <div class="d-flex">
              <h5
                class="purecounter mb-0 fw-bold"
                data-purecounter-start="0"
                data-purecounter-end="3"
                data-purecounter-delay="200">
                0
              </h5>
              <span class="mb-0 h5">+</span>
            </div>
            <p class="mb-0">দক্ষ শিক্ষকগণ</p>
          </div>
        </div>
      </div>
      <!-- Counter item -->
      <div class="col-sm-6 col-xl-3">
        <div
          class="d-flex justify-content-center align-items-center p-4 bg-purple bg-opacity-10 rounded-3">
          <span class="display-6 lh-1 text-purple mb-0"><i class="fas fa-user-graduate"></i></span>
          <div class="ms-4 h6 fw-normal mb-0">
            <div class="d-flex">
              <h5
                class="purecounter mb-0 fw-bold"
                data-purecounter-start="0"
                data-purecounter-end="20"
                data-purecounter-delay="200">
                0
              </h5>
              <span class="mb-0 h5">K+</span>
            </div>
            <p class="mb-0">অনলাইন শিক্ষার্থী</p>
          </div>
        </div>
      </div>
      <!-- Counter item -->
      <div class="col-sm-6 col-xl-3">
        <div
          class="d-flex justify-content-center align-items-center p-4 bg-info bg-opacity-10 rounded-3">
          <span class="display-6 lh-1 text-info mb-0"><i class="bi bi-patch-check-fill"></i></span>
          <div class="ms-4 h6 fw-normal mb-0">
            <div class="d-flex">
              <h5
                class="purecounter mb-0 fw-bold"
                data-purecounter-start="0"
                data-purecounter-end="6"
                data-purecounter-delay="300">
                0
              </h5>
              <span class="mb-0 h5">K+</span>
            </div>
            <p class="mb-0">সার্টিফাইড কোর্স</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- =======================
Counter END -->

<!-- =======================
Popular course START -->
<section>
  <div class="container">
    <!-- Title -->
    <div class="row mb-4">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="fs-1">সবচেয়ে জনপ্রিয় কোর্সসমূহ</h2>
        <p class="mb-0">
          আপনার প্রয়োজন অনুসারে কোর্সটি নির্বাচন করুন
        </p>
      </div>
    </div>
    <div class="row g-4 mt-3">
      <?php
      $courses = get_courses($conn);
      foreach ($courses as $course): ?>
        <div class="col-sm-6 col-lg-4 col-xl-3">
          <div class="card shadow h-100">
            <!-- Image -->
            <img
              src="./uploads/img/thumbnails/<?= $course['thumbnail'] ?>"
              class="card-img-top"
              alt="course image" />
            <!-- Card body -->
            <div class="card-body pb-0">
              <!-- Badge and favorite -->
              <div class="d-flex justify-content-between mb-2">
                <a
                  href="#"
                  class="badge bg-purple bg-opacity-10 text-purple">All level</a>
                <a href="#" class="h6 mb-0"><i class="far fa-heart"></i></a>
              </div>
              <!-- Title -->
              <h5 class="card-title fw-normal">
                <a href="#"><?= $course['title'] ?></a>
              </h5>
              <p class="mb-2 text-truncate-2">
                <?= $course['short_desc'] ?>
              </p>
              <!-- Rating star -->
              <ul class="list-inline mb-0">
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="far fa-star text-warning"></i>
                </li>
                <li class="list-inline-item ms-2 h6 fw-light mb-0">
                  4.0/5.0
                </li>
              </ul>
            </div>
            <!-- Card footer -->
            <div class="card-footer pt-0 pb-3">
              <hr />
              <div class="d-flex justify-content-between">
                <span class="h6 fw-light mb-0">
                  <i class="far fa-clock text-danger me-2"></i>
                  <?= $course['duration'] ?>
                </span>
                <span class="h6 fw-light mb-0">
                  <i class="fas fa-table text-orange me-2"></i>
                  <?= count_topics($conn, $course['id']) ?> lectures
                </span>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>
<!-- =======================
Popular course END -->

<!-- =======================
Action box START -->
<section class="pt-0 pt-lg-5">
  <div class="container position-relative">
    <!-- SVG decoration START -->
    <figure
      class="position-absolute top-50 start-50 translate-middle ms-2">
      <svg>
        <path
          class="fill-white opacity-4"
          d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z" />
        <path
          class="fill-white opacity-4"
          d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z" />
        <path
          class="fill-white opacity-4"
          d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z" />
        <path
          class="fill-white opacity-4"
          d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z" />
      </svg>
    </figure>
    <!-- SVG decoration END -->

    <div class="row">
      <div class="col-12">
        <div class="bg-info p-4 p-sm-5 rounded-3">
          <div class="row position-relative">
            <!-- Svg decoration -->
            <figure
              class="fill-white opacity-1 position-absolute top-50 start-0 translate-middle-y">
              <svg width="141px" height="141px">
                <path
                  d="M140.520,70.258 C140.520,109.064 109.062,140.519 70.258,140.519 C31.454,140.519 -0.004,109.064 -0.004,70.258 C-0.004,31.455 31.454,-0.003 70.258,-0.003 C109.062,-0.003 140.520,31.455 140.520,70.258 Z" />
              </svg>
            </figure>
            <!-- Action box -->
            <div class="col-11 mx-auto position-relative">
              <div class="row align-items-center">
                <!-- Title -->
                <div class="col-lg-7">
                  <h3 class="text-white">শিক্ষক হিসেবে যোগ দিন!</h3>
                  <p class="text-white mb-3 mb-lg-0">
                    আপনার অভিজ্ঞতা শেয়ার করুন, গাইড করুন শিক্ষার্থীদের, এবং আমাদের প্ল্যাটফর্মে একজন দক্ষ শিক্ষক হিসাবে নিজেকে প্রতিষ্ঠিত করুন।
                  </p>
                </div>
                <!-- Content and input -->
                <div class="col-lg-5 text-lg-end">
                  <a href="coming_soon.php" class="btn btn-outline-warning mb-0">শিক্ষাদান শুরু করুন</a>
                </div>
              </div>
            </div>
          </div>
          <!-- Row END -->
        </div>
      </div>
    </div>
    <!-- Row END -->
  </div>
</section>
<!-- =======================
Action box END -->

<!-- =======================
Trending courses START -->
<section class="pb-5 pt-0 pt-lg-5">
  <div class="container">
    <!-- Title -->
    <div class="row mb-4">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="fs-1">আমাদের আপকামিং কোর্স</h2>
        <p class="mb-0">
          কোর্সগুলোতে শীগ্রই আপনারা ভর্তি হতে পারবেন।</p>
      </div>
    </div>
    <div class="row">
      <!-- Slider START -->
      <div class="tiny-slider arrow-round arrow-blur arrow-hover">
        <div
          class="tiny-slider-inner pb-1"
          data-autoplay="true"
          data-arrow="true"
          data-edge="2"
          data-dots="false"
          data-items="3"
          data-items-lg="2"
          data-items-sm="1">
          <!-- Card item START -->
          <div>
            <div class="card action-trigger-hover border bg-transparent">
              <!-- Image -->
              <img
                src="assets/images/courses/4by3/14.jpg"
                class="card-img-top"
                alt="course image" />
              <!-- Ribbon -->
              <div class="ribbon mt-3"><span>Free</span></div>
              <!-- Card body -->
              <div class="card-body pb-0">
                <!-- Badge and favorite -->
                <div class="d-flex justify-content-between mb-3">
                  <span class="hstack gap-2">
                    <a
                      href="#"
                      class="badge bg-primary bg-opacity-10 text-primary">Design</a>
                    <a href="#" class="badge text-bg-dark">Beginner</a>
                  </span>
                  <a href="#" class="h6 fw-light mb-0"><i class="far fa-bookmark"></i></a>
                </div>
                <!-- Title -->
                <h5 class="card-title">
                  <a href="#">The complete Digital Marketing Course - 8 Course in
                    1</a>
                </h5>
                <!-- Rating -->
                <div class="d-flex justify-content-between mb-2">
                  <div class="hstack gap-2">
                    <p class="text-warning m-0">
                      4.5<i class="fas fa-star text-warning ms-1"></i>
                    </p>
                    <span class="small">(6500)</span>
                  </div>
                  <div class="hstack gap-2">
                    <p class="h6 fw-light mb-0 m-0">6500</p>
                    <span class="small">(Student)</span>
                  </div>
                </div>
                <!-- Time -->
                <div class="hstack gap-3">
                  <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger me-2"></i>6h
                    56m</span>
                  <span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>82
                    lectures</span>
                </div>
              </div>
              <!-- Card footer -->
              <div class="card-footer pt-0 bg-transparent">
                <hr />
                <!-- Avatar and Price -->
                <div
                  class="d-flex justify-content-between align-items-center">
                  <!-- Avatar -->
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-sm">
                      <img
                        class="avatar-img rounded-1"
                        src="assets/images/avatar/10.jpg"
                        alt="avatar" />
                    </div>
                    <p class="mb-0 ms-2">
                      <a href="#" class="h6 fw-light mb-0">Larry Lawson</a>
                    </p>
                  </div>
                  <!-- Price -->
                  <div>
                    <h4 class="text-success mb-0 item-show">Free</h4>
                    <a
                      href="#"
                      class="btn btn-sm btn-success-soft item-show-hover"><i class="fas fa-shopping-cart me-2"></i>Add to
                      cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Card item END -->

          <!-- Card item START -->
          <div>
            <div class="card action-trigger-hover border bg-transparent">
              <!-- Image -->
              <img
                src="assets/images/courses/4by3/15.jpg"
                class="card-img-top"
                alt="course image" />
              <!-- Card body -->
              <div class="card-body pb-0">
                <!-- Badge and favorite -->
                <div class="d-flex justify-content-between mb-3">
                  <span class="hstack gap-2">
                    <a
                      href="#"
                      class="badge bg-primary bg-opacity-10 text-primary">Development</a>
                    <a href="#" class="badge text-bg-dark">All level</a>
                  </span>
                  <a href="#" class="h6 fw-light mb-0"><i class="far fa-bookmark"></i></a>
                </div>
                <!-- Title -->
                <h5 class="card-title">
                  <a href="#">Angular – The Complete Guide (2021 Edition)</a>
                </h5>
                <!-- Rating -->
                <div class="d-flex justify-content-between mb-2">
                  <div class="hstack gap-2">
                    <p class="text-warning m-0">
                      4.0<i class="fas fa-star text-warning ms-1"></i>
                    </p>
                    <span class="small">(3500)</span>
                  </div>
                  <div class="hstack gap-2">
                    <p class="h6 fw-light mb-0 m-0">4500</p>
                    <span class="small">(Student)</span>
                  </div>
                </div>
                <!-- Time -->
                <div class="hstack gap-3">
                  <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger me-2"></i>12h
                    45m</span>
                  <span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>65
                    lectures</span>
                </div>
              </div>
              <!-- Card footer -->
              <div class="card-footer pt-0 bg-transparent">
                <hr />
                <!-- Avatar and Price -->
                <div
                  class="d-flex justify-content-between align-items-center">
                  <!-- Avatar -->
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-sm">
                      <img
                        class="avatar-img rounded-1"
                        src="assets/images/avatar/04.jpg"
                        alt="avatar" />
                    </div>
                    <p class="mb-0 ms-2">
                      <a href="#" class="h6 fw-light mb-0">Billy Vasquez</a>
                    </p>
                  </div>
                  <!-- Price -->
                  <div>
                    <h4 class="text-success mb-0 item-show">$255</h4>
                    <a
                      href="#"
                      class="btn btn-sm btn-success-soft item-show-hover"><i class="fas fa-shopping-cart me-2"></i>Add to
                      cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Card item END -->

          <!-- Card item START -->
          <div>
            <div class="card action-trigger-hover border bg-transparent">
              <!-- Image -->
              <img
                src="assets/images/courses/4by3/17.jpg"
                class="card-img-top"
                alt="course image" />
              <!-- Card body -->
              <div class="card-body pb-0">
                <!-- Badge and favorite -->
                <div class="d-flex justify-content-between mb-3">
                  <span class="hstack gap-2">
                    <a
                      href="#"
                      class="badge bg-primary bg-opacity-10 text-primary">Design</a>
                    <a href="#" class="badge text-bg-dark">Beginner</a>
                  </span>
                  <a href="#" class="h6 fw-light mb-0"><i class="far fa-bookmark"></i></a>
                </div>
                <!-- Title -->
                <h5 class="card-title">
                  <a href="#">Time Management Mastery: Do More, Stress Less</a>
                </h5>
                <!-- Rating -->
                <div class="d-flex justify-content-between mb-2">
                  <div class="hstack gap-2">
                    <p class="text-warning m-0">
                      4.5<i class="fas fa-star text-warning ms-1"></i>
                    </p>
                    <span class="small">(2000)</span>
                  </div>
                  <div class="hstack gap-2">
                    <p class="h6 fw-light mb-0 m-0">8000</p>
                    <span class="small">(Student)</span>
                  </div>
                </div>
                <!-- Time -->
                <div class="hstack gap-3">
                  <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger me-2"></i>24h
                    56m</span>
                  <span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>55
                    lectures</span>
                </div>
              </div>
              <!-- Card footer -->
              <div class="card-footer pt-0 bg-transparent">
                <hr />
                <!-- Avatar and Price -->
                <div
                  class="d-flex justify-content-between align-items-center">
                  <!-- Avatar -->
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-sm">
                      <img
                        class="avatar-img rounded-1"
                        src="assets/images/avatar/09.jpg"
                        alt="avatar" />
                    </div>
                    <p class="mb-0 ms-2">
                      <a href="#" class="h6 fw-light mb-0">Lori Stevens</a>
                    </p>
                  </div>
                  <!-- Price -->
                  <div>
                    <h4 class="text-success mb-0 item-show">$500</h4>
                    <a
                      href="#"
                      class="btn btn-sm btn-success-soft item-show-hover"><i class="fas fa-shopping-cart me-2"></i>Add to
                      cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Card item END -->

          <!-- Card item START -->
          <div>
            <div class="card action-trigger-hover border bg-transparent">
              <!-- Image -->
              <img
                src="assets/images/courses/4by3/16.jpg"
                class="card-img-top"
                alt="course image" />
              <!-- Card body -->
              <div class="card-body pb-0">
                <!-- Badge and favorite -->
                <div class="d-flex justify-content-between mb-3">
                  <span class="hstack gap-2">
                    <a
                      href="#"
                      class="badge bg-primary bg-opacity-10 text-primary">Design</a>
                    <a href="#" class="badge text-bg-dark">Beginner</a>
                  </span>
                  <a href="#" class="h6 fw-light mb-0"><i class="far fa-bookmark"></i></a>
                </div>
                <!-- Title -->
                <h5 class="card-title">
                  <a href="#">Time Management Mastery: Do More, Stress Less</a>
                </h5>
                <!-- Rating -->
                <div class="d-flex justify-content-between mb-2">
                  <div class="hstack gap-2">
                    <p class="text-warning m-0">
                      4.0<i class="fas fa-star text-warning ms-1"></i>
                    </p>
                    <span class="small">(2000)</span>
                  </div>
                  <div class="hstack gap-2">
                    <p class="h6 fw-light mb-0 m-0">1200</p>
                    <span class="small">(Student)</span>
                  </div>
                </div>
                <!-- Time -->
                <div class="hstack gap-3">
                  <span class="h6 fw-light mb-0"><i class="far fa-clock text-danger me-2"></i>09h
                    56m</span>
                  <span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>21
                    lectures</span>
                </div>
              </div>
              <!-- Card footer -->
              <div class="card-footer pt-0 bg-transparent">
                <hr />
                <!-- Avatar and Price -->
                <div
                  class="d-flex justify-content-between align-items-center">
                  <!-- Avatar -->
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-sm">
                      <img
                        class="avatar-img rounded-1"
                        src="assets/images/avatar/01.jpg"
                        alt="avatar" />
                    </div>
                    <p class="mb-0 ms-2">
                      <a href="#" class="h6 fw-light mb-0">Frances Guerrero</a>
                    </p>
                  </div>
                  <!-- Price -->
                  <div>
                    <h4 class="text-success mb-0 item-show">$200</h4>
                    <a
                      href="#"
                      class="btn btn-sm btn-success-soft item-show-hover"><i class="fas fa-shopping-cart me-2"></i>Add to
                      cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Card item END -->
        </div>
      </div>
      <!-- Slider END -->
    </div>
  </div>
</section>
<!-- =======================
Trending courses END -->

<!-- =======================
Reviews START -->
<section class="bg-light">
  <div class="container">
    <div class="row g-4 g-lg-5 align-items-center">
      <div class="col-xl-7 order-2 order-xl-1">
        <div class="row mt-0 mt-xl-5">
          <!-- Review -->
          <div class="col-md-7 position-relative mb-0 mt-0 mt-md-5">
            <!-- SVG -->
            <figure
              class="fill-danger opacity-2 position-absolute top-0 start-0 translate-middle mb-3">
              <svg width="211px" height="211px">
                <path
                  d="M210.030,105.011 C210.030,163.014 163.010,210.029 105.012,210.029 C47.013,210.029 -0.005,163.014 -0.005,105.011 C-0.005,47.015 47.013,-0.004 105.012,-0.004 C163.010,-0.004 210.030,47.015 210.030,105.011 Z"></path>
              </svg>
            </figure>

            <div
              class="bg-body shadow text-center p-4 rounded-3 position-relative mb-5 mb-md-0">
              <!-- Avatar -->
              <div class="avatar avatar-xl mb-3">
                <img
                  class="avatar-img rounded-circle"
                  src="./uploads/img/users/user-06.jpg"
                  alt="avatar" />
              </div>
              <!-- Content -->
              <blockquote>
                <p>
                  <span class="me-1 small"><i class="fas fa-quote-left"></i></span>
                  এক কথায় অসাধারণ একটা কোর্স। আর সাপোর্ট সিস্টেমটাও অসাধারণ ছিল। বাংলাদেশের মধ্যে যতো কোর্স আছে এই কোর্সটার মতো কোর্স আমি কোথাও দেখিনি। অসংখ ধন্যবাদ স্যার।
                  <span class="ms-1 small"><i class="fas fa-quote-right"></i></span>
                </p>
              </blockquote>
              <!-- Rating -->
              <ul class="list-inline mb-2">
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star-half-alt text-warning"></i>
                </li>
              </ul>
              <!-- Info -->
              <h6 class="mb-0">Saikat Chowdhury</h6>
            </div>
          </div>

          <!-- Mentor list -->
          <div class="col-md-5 mt-5 mt-md-0 d-none d-md-block">
            <div
              class="bg-body shadow p-4 rounded-3 d-inline-block position-relative">
              <!-- Icon -->
              <div
                class="icon-lg bg-warning rounded-circle position-absolute top-0 start-100 translate-middle">
                <i class="bi bi-shield-fill-check text-dark"></i>
              </div>
              <!-- Title -->
              <h6 class="mb-3">27+ ভেরিফাইড মেন্টর</h6>
              <!-- Mentor Item -->
              <div class="d-flex align-items-center mb-3">
                <!-- Avatar -->
                <div class="avatar avatar-sm">
                  <img
                    class="avatar-img rounded-1"
                    src="uploads/img/instructors/instructor-02.png"
                    alt=" avatar" />
                </div>
                <!-- Info -->
                <div class="ms-2">
                  <h6 class="mb-0">Md Sharif Ahmed</h6>
                  <p class="mb-0 small">Tutor of Civil Department</p>
                </div>
              </div>

              <!-- Mentor Item -->
              <div class="d-flex align-items-center mb-3">
                <!-- Avatar -->
                <div class="avatar avatar-sm ">
                  <img
                    class="avatar-img rounded-circle"
                    src="uploads/img/users/user-08.jpg"
                    alt="avatar" />
                </div>
                <!-- Info -->
                <div class="ms-2">
                  <h6 class="mb-0">Ayon Paul</h6>
                  <p class="mb-0 small">Tutor of chemistry</p>
                </div>
              </div>

              <!-- Mentor Item -->
              <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar avatar-sm">
                  <img
                    class="avatar-img rounded-circle"
                    src="uploads/img/users/user-09.jpg"
                    alt="avatar" />
                </div>
                <!-- Info -->
                <div class="ms-2">
                  <h6 class="mb-0">Anik Dey</h6>
                  <p class="mb-0 small">Tutor of technology</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Row END -->

        <div class="row mt-5 mt-xl-0">
          <!-- Rating -->
          <div
            class="col-7 mt-0 mt-xl-5 text-end position-relative z-index-1 d-none d-md-block">
            <!-- SVG -->
            <figure
              class="fill-danger position-absolute top-0 start-50 mt-n7 ms-6 ps-3 pt-2 z-index-n1 d-none d-lg-block">
              <svg enable-background="new 0 0 160.7 159.8" height="180px">
                <path
                  d="m153.2 114.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                <path
                  d="m116.4 114.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <path
                  d="m134.8 114.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <path
                  d="m135.1 96.9c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <path
                  d="m153.5 96.9c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                <path
                  d="m98.3 96.9c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <ellipse cx="116.7" cy="99.1" rx="2.1" ry="2.2" />
                <path
                  d="m153.2 149.8c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.3 0.9-2.2 2.1-2.2z" />
                <path
                  d="m135.1 132.2c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2 0-1.3 0.9-2.2 2.1-2.2z" />
                <path
                  d="m153.5 132.2c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.3 0.9-2.2 2.1-2.2z" />
                <path
                  d="m80.2 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2z" />
                <path
                  d="m117 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <path
                  d="m98.6 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <path
                  d="m135.4 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <path
                  d="m153.8 79.3c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <path
                  d="m80.6 61.7c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                <ellipse cx="98.9" cy="63.9" rx="2.1" ry="2.2" />
                <path
                  d="m117.3 61.7c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <ellipse cx="62.2" cy="63.9" rx="2.1" ry="2.2" />
                <ellipse cx="154.1" cy="63.9" rx="2.1" ry="2.2" />
                <path
                  d="m135.7 61.7c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <path
                  d="m154.4 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <path
                  d="m80.9 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                <path
                  d="m44.1 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                <path
                  d="m99.2 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2z" />
                <ellipse cx="117.6" cy="46.3" rx="2.1" ry="2.2" />
                <path
                  d="m136 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <path
                  d="m62.5 44.1c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                <path
                  d="m154.7 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <path
                  d="m62.8 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                <ellipse cx="136.3" cy="28.6" rx="2.1" ry="2.2" />
                <path
                  d="m99.6 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                <path
                  d="m117.9 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2z" />
                <path
                  d="m81.2 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2-0.1-1.2 0.9-2.2 2.1-2.2z" />
                <path
                  d="m26 26.5c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2c-1.2 0-2.1-1-2.1-2.2s0.9-2.2 2.1-2.2z" />
                <ellipse cx="44.4" cy="28.6" rx="2.1" ry="2.2" />
                <path
                  d="m136.6 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2 0.1 1.2-0.9 2.2-2.1 2.2z" />
                <path
                  d="m155 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2 0.1 1.2-0.9 2.2-2.1 2.2z" />
                <path
                  d="m26.3 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-0.9 2.2-2.1 2.2z" />
                <path
                  d="m81.5 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-0.9 2.2-2.1 2.2z" />
                <path
                  d="m63.1 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-0.9 2.2-2.1 2.2z" />
                <path
                  d="m44.7 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-0.9 2.2-2.1 2.2z" />
                <path
                  d="m118.2 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2 0.1 1.2-0.9 2.2-2.1 2.2z" />
                <path
                  d="m7.9 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2 0.1 1.2-0.9 2.2-2.1 2.2z" />
                <path
                  d="m99.9 13.2c-1.2 0-2.1-1-2.1-2.2s1-2.2 2.1-2.2c1.2 0 2.1 1 2.1 2.2s-1 2.2-2.1 2.2z" />
              </svg>
            </figure>

            <div
              class="p-3 bg-primary d-inline-block rounded-4 shadow-lg text-center"
              style="
                      background: url(assets/images/pattern/02.png) no-repeat
                        center center;
                      background-size: cover;
                    ">
              <!-- Info -->
              <h5 class="text-white mb-0">4.5/5.0</h5>
              <!-- Rating -->
              <ul class="list-inline mb-2">
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star-half-alt text-warning"></i>
                </li>
              </ul>
              <p class="text-white mb-0">৩৬৫টি রেটিং-এর ভিত্তিতে</p>
            </div>
          </div>

          <!-- Review -->
          <div class="col-md-5 mt-n6 mb-0 mb-md-5">
            <div class="bg-body shadow text-center p-4 rounded-3">
              <!-- Avatar -->
              <div class="avatar avatar-xl mb-3">
                <img
                  class="avatar-img rounded-circle"
                  src="./uploads/img/users/user-07.jpg"
                  alt="avatar" />
              </div>
              <!-- Content -->
              <blockquote>
                <p>
                  <span class="me-1 small"><i class="fas fa-quote-left"></i></span>
                  এই কোর্স টা আমাকে অনেক কিছু নতুন করে চিন্তা করতে শিখিয়েছে। আমার জানা মতে এমন কোয়ালিটি ফুল কোর্স আর নাই। এক কথায় অসাধারণ।
                  <span class="ms-1 small"><i class="fas fa-quote-right"></i></span>
                </p>
              </blockquote>
              <!-- Rating -->
              <ul class="list-inline mb-2">
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star text-warning"></i>
                </li>
                <li class="list-inline-item me-0 small">
                  <i class="fas fa-star-half-alt text-warning"></i>
                </li>
              </ul>
              <!-- Info -->
              <h6 class="mb-0">Ataur Rahman</h6>
            </div>
          </div>
        </div>
        <!-- Row END -->
      </div>
      <div class="col-xl-5 order-1 text-center text-xl-start">
        <!-- Title -->
        <h2 class="fs-1">আমাদের শিক্ষার্থীদের মূল্যবান মতামত</h2>
        <p>আমাদের শিক্ষার্থীরা তাদের অভিজ্ঞতা ও মতামতের মাধ্যমে আমাদের কোর্সগুলোর গুণগত মান এবং শিক্ষাদানের প্রক্রিয়া নিয়ে মূল্যবান প্রতিক্রিয়া প্রদান করেছেন। এই প্রতিক্রিয়া আমাদের সেবাকে আরও উন্নত করতে সহায়তা করে এবং আপনিও তাদের অভিজ্ঞতা থেকে অনুপ্রাণিত হয়ে সঠিক কোর্সটি বেছে নিতে পারবেন।</p>
        <!-- <a href="" class="btn btn-primary mb-0">রিভিউ দেখুন</a> -->
      </div>
    </div>
    <!-- Row END -->
  </div>
</section>


<?php
$content = ob_get_clean();
include('layouts/website.php');
?>