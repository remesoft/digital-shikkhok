<?php

function get_total_students($conn)
{
  $sql = "SELECT COUNT(*) AS count FROM users WHERE role = 'student'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['count'];
}

function get_total_courses($conn)
{
  $sql = "SELECT COUNT(*) AS count FROM courses";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['count'];
}

function get_total_instructors($conn)
{
  $sql = "SELECT COUNT(*) AS count FROM users WHERE role = 'instructor' or role = 'admin'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['count'];
}

function get_total_earnings($conn)
{
  $sql = "SELECT SUM(c.price) AS total_earnings FROM enrollments e JOIN courses c ON e.course_id = c.id WHERE e.status = 'success'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['total_earnings'] ?? 0;
}

function total_course_enrolled($conn, $user_id)
{
  $sql = "SELECT COUNT(*) AS count FROM enrollments WHERE user_id = $user_id AND status = 'success'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['count'] ?? 0;
}

function total_payment($conn, $user_id)
{
  $sql = "SELECT SUM(c.price) AS total_payment FROM enrollments e JOIN courses c ON e.course_id = c.id WHERE e.user_id = $user_id AND e.status = 'success'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['total_payment'] ?? 0;
}
