<?php

class PostTableSeeder extends Seeder {
	
	public function run() {
		$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Praesent vel ligula scelerisque, vehicula dui eu, fermentum velit. 
                    Phasellus ac ornare eros, quis malesuada augue. Nunc ac nibh at mauris dapibus fermentum. 
                    In in aliquet nisi, ut scelerisque arcu. Integer tempor, nunc ac lacinia cursus, 
                    mauris justo volutpat elit, 
                    eget accumsan nulla nisi ut nisi. Etiam non convallis ligula. Nulla urna augue, 
                    dignissim ac semper in, ornare ac mauris. Duis nec felis mauris.';
        
        for( $i = 1 ; $i <= 20 ; $i++ ) {
            $post = new Post;
            $post->title = "Sample Post No. $i";
            $post->alias = str_replace(' ', '_', $post->title);
            $post->featured_image = 0;
            $post->content = $content;
            $post->save();
        }
	}
}