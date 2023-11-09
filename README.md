<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Social Life Platform

This is a social media platform designed to connect users, share posts, and facilitate communication and interaction between individuals. The platform aims to provide a user-friendly experience for creating and consuming content, fostering engagement and community building.

## Core Features

1. **User Authentication**: Allow users to register, log in, and manage their accounts securely.

2. **User Profiles**: Enable users to create and customize their profiles with information, profile pictures, and other relevant details.

3. **News Feed**: Implement a news feed that displays posts from users that a particular user follows, allowing users to see and engage with the latest updates from their network.

4. **Post Creation and Sharing**: Allow users to create and share posts, including text, images, videos, and other multimedia content.

5. **Interactions and Engagement**: Enable users to like, comment on, and share posts from other users, fostering engagement and interaction within the platform.

6. **Friend/Follow System**: Implement a system that allows users to follow or befriend other users, creating connections and enabling users to see updates from their friends or followed users.

## Models

### User Model
- **id**: integer
- **username**: string
- **password**: string (hashed)
- **email**: string
- **created_at**: timestamp
- **updated_at**: timestamp

### Post Model
- **id**: integer
- **user_id**: integer (foreign key to User Model)
- **content**: text
- **image_url**: string
- **created_at**: timestamp
- **updated_at**: timestamp
- **deleted_at**: timestamp

### Comment Model
- **id**: integer
- **user_id**: integer (foreign key to User Model)
- **post_id**: integer (foreign key to Post Model)
- **content**: text
- **created_at**: timestamp
- **updated_at**: timestamp
- **deleted_at**: timestamp

### Like Model
- **id**: integer
- **user_id**: integer (foreign key to User Model)
- **post_id**: integer (foreign key to Post Model)
- **created_at**: timestamp
- **updated_at**: timestamp

### Follower/Following Model
- **id**: integer
- **follower_id**: integer (foreign key to User Model)
- **following_id**: integer (foreign key to User Model)
- **created_at**: timestamp
- **updated_at**: timestamp

## Database Tables

### Users Table
| Column       | Type    |
|--------------|---------|
| id           | Integer |
| username     | String  |
| password     | String  |
| email        | String  |
| created_at   | Timestamp |
| updated_at   | Timestamp |

### Posts Table
| Column       | Type    |
|--------------|---------|
| id           | Integer |
| user_id      | Integer |
| content      | Text    |
| image_url    | String  |
| created_at   | Timestamp |
| updated_at   | Timestamp |
| deleted_at   | Timestamp |


### Comments Table
| Column       | Type    |
|--------------|---------|
| id           | Integer |
| user_id      | Integer |
| post_id      | Integer |
| content      | Text    |
| created_at   | Timestamp |
| updated_at   | Timestamp |
| deleted_at   | Timestamp |


### Likes Table
| Column       | Type    |
|--------------|---------|
| id           | Integer |
| user_id      | Integer |
| post_id      | Integer |
| created_at   | Timestamp |
| updated_at   | Timestamp |

### Followers Table
| Column       | Type    |
|--------------|---------|
| id           | Integer |
| follower_id  | Integer |
| following_id | Integer |
| created_at   | Timestamp |
| updated_at   | Timestamp |

