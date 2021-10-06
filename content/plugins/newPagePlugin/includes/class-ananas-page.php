<?php

namespace newPagePlugin;

if (!class_exists('AnanasPage')) {
    class AnanasPage
    {
        public function activation()
        {
            $this->createPost();
            flush_rewrite_rules();
        }

        public function createPost()
        {
            $content = $this->HtmlFormContent();
            //add new page meta
            $my_post = array(
                'post_title'    => 'ananas',
                'post_content'  => $content,
                'post_status'   => 'publish',
                'post_type'     => 'page'
            );

            // Insert the post into the database
            wp_insert_post($my_post);
        }

        public function deactivation()
        {
            if (post_exists('ananas')) {
                $post = get_page_by_title('ananas', OBJECT, 'page');
                wp_delete_post($post->ID);
            }
        }

        public function traitement_formulaire_ananas()
        {

            if (isset($_POST['ananas-response'])) {

                $yes_or_no = 'non';
                if ($_POST['yes_or_no'] == 'yes') {
                    $yes_or_no = 'oui';
                }

                // update_user_meta
                update_user_meta(get_current_user_id(), 'ananas_message', $_POST['story']);
                update_user_meta(get_current_user_id(), 'ananas_yes_or_no', $yes_or_no);
            }
        }

        public function HtmlFormContent()
        {
            return '<form action="#" method="POST" class="ananas-form">
                        <p>Amez-vous l\'ananas</p>
                        <div class="ananas_form_choice_container">
                            <div class="ananas_form_choice_container_item">
                                <input type="radio" id="yes" name="yes_or_no" value="yes">
                                <label for="yes">yes</label>
                            </div>
                            <div class="ananas_form_choice_container_item">
                                <input type="radio" id="no" name="yes_or_no" value="no">
                                <label for="no">no</label>
                            </div>
                        </div>
                        <div>
                            <label for="story">Pourquoi aimez-vous les ananas ou non ?</label>
                            <textarea id="story" name="story" rows="5" cols="33" > </textarea>
                        </div>

                        <p>
                            <input id="submit" class="ananas_form_submit" type="submit" name="ananas-response" id="submit" class="submit" value="Envoyer" />
                        </p>
                    </form>';
        }
    }
}
