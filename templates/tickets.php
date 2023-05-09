<?php
    function outputTickets($tickets){
        ob_start();
?>
        <div class="tickets-list">
            <ul>
<?php
            if(count($tickets) == 0)
                outputNoTickets();
            else{
                foreach($tickets as $ticket){
                    outputTicket($ticket);
                }
            }
?>
            </ul>
        </div>
<?php
        return ob_get_clean();
    }

    function outputTicket($ticket){
?>  
        <li class="ticket">
            <ul>
                <li><p>#<?=$ticket['id']?></p></li>
                <li><p><?=$ticket['title']?></p></li>
                <li><p><?=date('d-m-Y', $ticket['date'])?></p></li>
                <li><p><?=$ticket['status']?></p></li>
            </ul>
        </li>   
<?php

    }

    function outputNoTickets(){
?>
    <h2>
        You have no tickets yet. <a href="new_ticket.php">Create one</a>.
    </h2>
<?php
    }

    function outputTicketDiscussion($ticket, $ticketHistory, $ticketHashtags, $ticketReplies){
        ob_start();
?>
        <div class="ticket-discussion">
            <a href="index.php"><img class="return" src="../icons/return.png" alt="return"/></a>
            <div class="ticket">
                <div class="ticket-header">
                    <div class="ticket-id-title">
                        <h1>#<?=$ticket['id']?></h1>
                        <h1><?=$ticket['title']?></h1>
                    </div>
                    <h1><?=$ticket['status']?></h1>
                </div>
                <div class="hashtags">
                    <?php foreach($ticketHashtags as $hashtag)
                        outputHashtag($hashtag);
                    ?>
                </div>
                <div class="ticket-body">
                    <p><?=$ticket['introduction']?></p>
                    <p><?=$ticket['description']?></p>
                </div>
                <div class="ticket-footer">
                    <h4>Created by: <?=$ticket['client']?></h4>
                    <h4>Assigned to: <?=$ticket['agent']?></h4>
                </div>
            </div>
            <div class="ticket-replies">
                <?php foreach($ticketReplies as $reply)
                    outputTicketReply($reply);
                ?>
                <form action="../actions/action_ticket_reply.php" method="post" class="ticket-reply-form">
                    <input type="hidden" name="ticket_id" value="<?=$ticket['id']?>"/>
                    <input type="hidden" name="user" value="<?=$_SESSION['username']?>"/>
                    <textarea name="reply" placeholder="Reply to this ticket..."></textarea>
                    <input class="ticket-reply-post" type="submit" value="Reply"/>
                </form>
            </div>
        </div>
<?php
        return ob_get_clean();
    }

    function outputHashtag($hashtag){
?>
        <div class="hashtag">
            <p><?=$hashtag['name']?></p>
        </div>
<?php
    }

    function outputTicketReply($reply){
?>
        <div class="ticket-reply">
            <div class="ticket-reply-header">
                <h4><?=$reply['user']?></h4>
                <h4><?=date('d-m-Y', $reply['reply_date'])?></h4>
            </div>
            <div class="ticket-reply-body">
                <p><?=$reply['reply']?></p>
            </div>
        </div>
<?php
    }
?>