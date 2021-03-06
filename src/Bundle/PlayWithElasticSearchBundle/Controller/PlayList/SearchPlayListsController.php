<?php

namespace Bundle\PlayWithElasticSearchBundle\Controller\PlayList;

use Atrapalo\Application\Model\PlayList\CommandHandler\SearchPlaylists\SearchPlayListsCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SearchPlayListsController
 */
class SearchPlayListsController extends Controller
{
    /**
     * @return Response
     */
    public function searchPlayListsAction(Request $request)
    {
        $playListResources = $this
            ->get('atrapalo.application.model.playlist.search_playlists.search_playlists_command_handler')
            ->handle(SearchPlayListsCommand::instance());

        return $this->render(
            'PlayWithElasticSearchBundle:Playlists:index.html.twig',
            [
                'playlists' => $playListResources,
                'playlist_name' => $request->get('playlist_name'),
                'track_name' => $request->get('track_name'),
                'composer' => $request->get('composer')
            ]
        );
    }
}
