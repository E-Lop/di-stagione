import * as React from "react";
import { useState, useEffect, useRef } from "react";
import { cn } from "@/lib/utils";

const Autocomplete = React.forwardRef(({
    className,
    placeholder = "Cerca...",
    value,
    onChange,
    onSelect,
    apiEndpoint = "/api/products/search",
    debounceMs = 300,
    minChars = 2,
    renderSuggestion,
    ...props
}, ref) => {
    const [suggestions, setSuggestions] = useState([]);
    const [isOpen, setIsOpen] = useState(false);
    const [isLoading, setIsLoading] = useState(false);
    const [selectedIndex, setSelectedIndex] = useState(-1);
    const inputRef = useRef(null);
    const dropdownRef = useRef(null);
    const debounceTimer = useRef(null);

    // Merge refs
    React.useImperativeHandle(ref, () => inputRef.current);

    // Fetch suggestions from API
    const fetchSuggestions = async (searchTerm) => {
        if (searchTerm.length < minChars) {
            setSuggestions([]);
            setIsOpen(false);
            return;
        }

        setIsLoading(true);

        try {
            const response = await fetch(`${apiEndpoint}?q=${encodeURIComponent(searchTerm)}`);
            const data = await response.json();
            setSuggestions(data);
            setIsOpen(data.length > 0);
        } catch (error) {
            console.error('Error fetching suggestions:', error);
            setSuggestions([]);
            setIsOpen(false);
        } finally {
            setIsLoading(false);
        }
    };

    // Debounced search
    useEffect(() => {
        if (debounceTimer.current) {
            clearTimeout(debounceTimer.current);
        }

        debounceTimer.current = setTimeout(() => {
            if (value) {
                fetchSuggestions(value);
            } else {
                setSuggestions([]);
                setIsOpen(false);
            }
        }, debounceMs);

        return () => {
            if (debounceTimer.current) {
                clearTimeout(debounceTimer.current);
            }
        };
    }, [value]);

    // Handle click outside
    useEffect(() => {
        const handleClickOutside = (event) => {
            if (dropdownRef.current && !dropdownRef.current.contains(event.target) &&
                inputRef.current && !inputRef.current.contains(event.target)) {
                setIsOpen(false);
            }
        };

        document.addEventListener('mousedown', handleClickOutside);
        return () => document.removeEventListener('mousedown', handleClickOutside);
    }, []);

    // Handle keyboard navigation
    const handleKeyDown = (e) => {
        if (!isOpen) return;

        switch (e.key) {
            case 'ArrowDown':
                e.preventDefault();
                setSelectedIndex(prev =>
                    prev < suggestions.length - 1 ? prev + 1 : prev
                );
                break;
            case 'ArrowUp':
                e.preventDefault();
                setSelectedIndex(prev => prev > 0 ? prev - 1 : -1);
                break;
            case 'Enter':
                e.preventDefault();
                if (selectedIndex >= 0 && suggestions[selectedIndex]) {
                    handleSelect(suggestions[selectedIndex]);
                }
                break;
            case 'Escape':
                setIsOpen(false);
                setSelectedIndex(-1);
                break;
        }
    };

    const handleSelect = (suggestion) => {
        if (onSelect) {
            onSelect(suggestion);
        } else {
            onChange({ target: { value: suggestion.name } });
        }
        setIsOpen(false);
        setSelectedIndex(-1);
    };

    const defaultRenderSuggestion = (suggestion) => (
        <div className="flex items-center gap-3">
            {suggestion.image_url && (
                <img
                    src={suggestion.image_url}
                    alt={suggestion.name}
                    className="w-10 h-10 object-cover rounded"
                />
            )}
            <div className="flex-1">
                <div className="font-medium">{suggestion.name}</div>
                <div className="text-xs text-gray-500">
                    {suggestion.type === 'frutta' ? '🍎 Frutta' : '🥕 Verdura'}
                </div>
            </div>
        </div>
    );

    return (
        <div className="relative w-full">
            <input
                ref={inputRef}
                type="text"
                className={cn(
                    "flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50",
                    className
                )}
                placeholder={placeholder}
                value={value}
                onChange={onChange}
                onKeyDown={handleKeyDown}
                {...props}
            />

            {/* Suggestions Dropdown */}
            {isOpen && suggestions.length > 0 && (
                <div
                    ref={dropdownRef}
                    className="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-md shadow-lg max-h-80 overflow-y-auto"
                >
                    {suggestions.map((suggestion, index) => (
                        <div
                            key={suggestion.id}
                            className={cn(
                                "px-3 py-2 cursor-pointer transition-colors",
                                index === selectedIndex
                                    ? "bg-green-100"
                                    : "hover:bg-gray-100"
                            )}
                            onClick={() => handleSelect(suggestion)}
                            onMouseEnter={() => setSelectedIndex(index)}
                        >
                            {renderSuggestion
                                ? renderSuggestion(suggestion)
                                : defaultRenderSuggestion(suggestion)
                            }
                        </div>
                    ))}
                </div>
            )}

            {/* Loading indicator */}
            {isLoading && (
                <div className="absolute right-3 top-1/2 -translate-y-1/2">
                    <div className="w-4 h-4 border-2 border-gray-300 border-t-green-600 rounded-full animate-spin"></div>
                </div>
            )}
        </div>
    );
});

Autocomplete.displayName = "Autocomplete";

export { Autocomplete };
