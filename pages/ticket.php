<?php
    require_once(__DIR__ . '/../database/tickets.php');
    require_once(__DIR__ . '/../database/users.php');
    require_once(__DIR__ . '/../templates/common.php');
    require_once(__DIR__ . '/../templates/tickets.php');

    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: index.php');
        exit();
    }
    
    $ticket_id = $_GET['id'];
    $ticket = getTicket($ticket_id);
    $ticketHistory = getTicketHistory($ticket_id);
    $ticketHashtags = getTicketHashtags($ticket_id);
    $ticketReplies = getTicketReplies($ticket_id);
    $departments = getDepartments();
    $statuses = getStatuses();
    $user = getUser($_SESSION['username']);
    $ticket['status'] = $statuses[$ticket['status_id'] - 1]['name'];

    outputHeader();
    outputAddSearchFilter(outputTicketDiscussion($ticket, $ticketHistory, $ticketHashtags, $ticketReplies, $statuses, $user['role']), $departments, $user['role']);
    outputFooter();
?>