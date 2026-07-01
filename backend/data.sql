-- Active: 1780917375212@@127.0.0.1@3306@linkup
use linkup;
INSERT INTO users (
    name,
    email,
    email_verified_at,
    password,
    headline,
    company,
    image_url,
    created_at,
    updated_at
) VALUES
(
    'Ayoub Sofi',
    'ayoub@example.com',
    NOW(),
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'Full Stack Developer | Laravel & React',
    'LinkUp',
    'https://randomuser.me/api/portraits/men/1.jpg',
    NOW(),
    NOW()
),
(
    'Sara Ahmed',
    'sara@example.com',
    NOW(),
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'UI/UX Designer',
    'Creative Studio',
    'https://randomuser.me/api/portraits/women/2.jpg',
    NOW(),
    NOW()
),
(
    'Mohamed Ali',
    'mohamed@example.com',
    NOW(),
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'Backend Laravel Developer',
    'Tech Solutions',
    'https://randomuser.me/api/portraits/men/3.jpg',
    NOW(),
    NOW()
),
(
    'Fatima Zahra',
    'fatima@example.com',
    NOW(),
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'Frontend React Developer',
    'Digital Agency',
    'https://randomuser.me/api/portraits/women/4.jpg',
    NOW(),
    NOW()
),
(
    'Youssef Karim',
    'youssef@example.com',
    NOW(),
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'Software Engineer',
    'Google',
    'https://randomuser.me/api/portraits/men/5.jpg',
    NOW(),
    NOW()
);


INSERT INTO posts (user_id, content, created_at, updated_at) VALUES
(1, 'Excited to start working on my new Laravel project! 🚀', NOW(), NOW()),
(2, 'Design is not just what it looks like, design is how it works.', NOW(), NOW()),
(3, 'Just finished building a REST API with Laravel Sanctum.', NOW(), NOW()),
(4, 'React Hooks make component development much easier.', NOW(), NOW()),
(5, 'Always keep learning. Technology never stops evolving.', NOW(), NOW());
