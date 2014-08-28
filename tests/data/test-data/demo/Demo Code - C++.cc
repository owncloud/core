#include <fgengine/util.hpp>

#include <SDL/SDL_image.h>
#include <SDL/SDL_rotozoom.h>
#include <iostream>
namespace sdl_util{
    
void apply_surface(const int x, const int y, surface* source, surface* destination ) {
    SDL_Rect offset;
    offset.x = x; offset.y = y;
    SDL_BlitSurface( source, NULL, destination, &offset );
}

surface* loadImage(const std::string path){
    surface* raw=NULL;
    surface* imp=NULL;
    raw=IMG_Load(path.c_str());
    if( raw != NULL ){
        imp=SDL_DisplayFormatAlpha(raw);
        SDL_FreeSurface(raw);
    }
    if(!imp)
        std::cerr<<"img load error: "<<IMG_GetError()<<std::endl;
    return imp;
}


surface* create_blank_surface (const int width, const int height ){
    surface *basis = SDL_GetVideoSurface();
    return SDL_CreateRGBSurface ( basis->flags, width, height,
                                    basis->format->BitsPerPixel,
                                    basis->format->Rmask,
                                    basis->format->Gmask,
                                    basis->format->Bmask,
                                    basis->format->Amask);
}

surface* copySurfaca(surface* const src){
    return SDL_ConvertSurface(const_cast<surface*>(src), src->format, src->flags);
}

surface* copySurfaca(const surface* src){
    return SDL_ConvertSurface(const_cast<surface*>(src), src->format, src->flags);
}


surface* flipImage( surface* origin, const flipDirection dir ){
    surface* ret = create_blank_surface( origin->w, origin->h );
    for( int x = 0, rx = ret->w - 1; x < ret->w; x++, rx-- ){
        for( int y = 0, ry = ret->h - 1; y < ret->h; y++, ry-- ){
            Uint32 pixel = get_pixel( origin, x, y );
            if( dir == flipDirection::FLIP_X )
                put_pixel( ret, rx, y, pixel );
            else
                put_pixel( ret, y, ry, pixel );
        }
    }
    matchColorKeys( origin, ret );
    return ret;
}

void resizeImage( surface*& img, const double newwidth, const double newheight ){
    double zoomx = newwidth / (float)img->w;
    double zoomy = newheight / (float)img->h;
    surface* sized = zoomSurface( img, zoomx, zoomy, SMOOTHING_OFF );
    matchColorKeys( img, sized );
    SDL_FreeSurface( img );
    img = sized;
}


void matchColorKeys(const surface* src, surface* dest ){
    if( src->flags & SDL_SRCCOLORKEY ){
        Uint32 colorkey = src->format->colorkey;
        SDL_SetColorKey( dest, SDL_SRCCOLORKEY, colorkey );
    }
}


Uint32 get_pixel(const surface* surface, const int x, const int y ){
    Uint32 *pixels = (Uint32*)surface->pixels;
    return pixels[ ( y * surface->w ) + x ];
}


void put_pixel( surface *surface, const int x, const int y, const Uint32 pixel ){
    Uint32 *pixels = (Uint32 *)surface->pixels;
    pixels[ ( y * surface->w ) + x ] = pixel;
}

bool isPixelTransparent(const int x, const int y, const surface* surface){
    Uint8 r,g,b,a;
    Uint32 px=get_pixel(surface, x, y);
    SDL_GetRGBA(px, surface->format, &r, &g,&b, &a);
    
    //fix for rotated images.
    return (a!=255);
}




}
